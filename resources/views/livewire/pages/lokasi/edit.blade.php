<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Edit lokasi',
    ])

    <div class="card border border-base-300">
        <form class="card-body space-y-6" wire:submit="simpan">
            <div class="grid md:grid-cols-3 gap-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Datel</span>
                    </label>
                    <select class="select select-bordered" wire:model.live="datel_id">
                        <option value="">Pilih datel</option>
                        @foreach ($datels as $witel => $datel)
                            <optgroup label="{{ $witel }}">
                                @foreach ($datel as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama lokasi</span>
                    </label>
                    <input wire:model="name" class="input input-bordered" />
                </div>
            </div>
            <div class="card-actions">
                <button class="btn btn-primary">
                    <x-tabler-check class="icon-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>

    <div class="divider">List token data</div>

    <div class="flex justify-between">
        <div></div>
        <label for="tokenForm" class="btn btn-primary btn-sm">
            <x-tabler-plus class="icon-4" />
            <span>Tambah token</span>
        </label>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nomor PLN</th>
                <th>Ukuran</th>
                <th>Daya</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($lokasi->tokens as $token)
                    <tr>
                        <td>{{ $token->id }}</td>
                        <td>{{ $token->nopln }}</td>
                        <td>{{ $token->ukuran }}</td>
                        <td>{{ $token->daya }}</td>
                        <td>
                            <button class="btn btn-xs btn-accent"
                                wire:click="$dispatch('editToken', {'token_id': {{ $token->id }}})">
                                <x-tabler-edit class="icon-4" />
                                <span>Edit</span>
                            </button>
                            <button class="btn btn-xs btn-error" wire:click="deleteToken({{ $token->id }})">
                                <x-tabler-trash class="icon-4" />
                                <span>Remove</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.token.form', [
        'lokasi' => $lokasi,
    ])

</div>
