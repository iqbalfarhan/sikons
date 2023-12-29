<div class="page-wrapper">
    <div>
        @livewire('partial.header', ['title' => 'Masuk ke aplikasi simaru'])
    </div>
    <div class="card border">
        <div class="card-body space-y-4">
            <div class="">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium provident sed quam labore
                    aliquid.
                    Molestiae, exercitationem eveniet. Facilis odit ipsam beatae at corporis, nemo sapiente aliquid,
                    deserunt molestiae similique quis?</p>
                <div class="divider"></div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text-alt">Password:</span>
                    </label>
                    <input type="text" class="input input-bordered" placeholder="input password sikons">
                </div>
            </div>
            <div class="card-actions">
                <button class="btn btn-primary">
                    <x-tabler-send class="icon-5" />
                    <span>Masuk ke simaru</span>
                </button>
            </div>
        </div>
    </div>
</div>
