<?php

namespace App\Http\Controllers;

use App\Http\Resources\LaporanResource;
use App\Models\Laporan;
use App\Models\Lokasi;
use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Laravel\Sanctum\PersonalAccessToken;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LaporanResource::collection(Laporan::where('tanggal', date('Y-m-d'))->latest()->paginate(15));
    }

    /**
     * Display a listing of the resource belongs to user.
     */

    public function mine()
    {
        return LaporanResource::collection(Laporan::where('user_id', auth()->id())->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' =>'required',
            'user_id' =>'required',
            'lokasi_id' =>'required',
            'waktu' =>'required'
        ]);

        return Laporan::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        $token = PersonalAccessToken::findToken(request()->bearerToken());
        if ($token) {
            return LaporanResource::make($laporan);
        }
        else{
            return response(401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        $valid = $request->validate([
            'tanggal' =>'required',
            'user_id' =>'required',
            'lokasi_id' =>'required',
            'waktu' =>'required'
        ]);

        return $laporan->update($valid);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        return $laporan->delete();
    }

    public function generate(Request $request){
        $request->validate([
            'tanggal' => 'required'
        ]);

        foreach (Lokasi::pluck('id') as $lokasi_id) {
            foreach (['malam', 'pagi', 'sore'] as $waktu) {
                Laporan::create([
                    'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                    'user_id' => Arr::random(User::pluck('id')->toArray()),
                    'lokasi_id' => $lokasi_id,
                    'waktu' => $waktu
                ]);
            }
        }
    }

    public function summarysnap($periode, $uniq){
        list($tahun, $bulan) = explode('-', $periode);
        $datas = Lokasi::with('laporans')->whereHas('datel', function($datel) {
            $datel->whereIn('witel', config('sikons.witels'));
        })->get()->groupBy('datel.witel');
        $filename = "summary-laporan-sikons-{$uniq}.jpg";

        $snap = SnappyImage::loadView('exports.laporan-summary-image', [
            'no' => 1,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'periode' => $periode,
            'datas' => $datas,
        ])->setOptions([
            'width' => 550
        ]);

        return $snap->inline($filename);
    }
}
