<?php

namespace App\Http\Controllers;

use App\Http\Resources\LaporanResource;
use App\Models\Laporan;
use Illuminate\Http\Request;

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
        return LaporanResource::make($laporan);
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
}
