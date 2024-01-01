<div>
    <input type="checkbox" id="createRole" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Create {{ $tab }}</h3>
            <div class="space-y-2 py-6">
                <div>
                    <div role="tablist" class="tabs tabs-boxed">
                        @foreach ($tabs as $tb)
                            <button role="tab" @class(['tab', 'tab-active' => $tb == $tab])
                                wire:click="$set('tab', '{{ $tb }}')"
                                type="button">{{ $tb }}</button>
                        @endforeach
                    </div>
                </div>

                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">{{ $tab }} name</span>
                        @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('name') input-error @enderror"
                        placeholder="Nama {{ $tab }}" wire:model.lazy="name">
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="createRole" class="btn">Close!</label>
                <button class="btn btn-primary">
                    <x-tabler-check class="icon-5" />
                    <span>Create</span>
                </button>
            </div>
        </form>
    </div>
</div>
