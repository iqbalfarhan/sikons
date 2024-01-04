<div class="page-wrapper max-w-lg">
    <div>
        @livewire('partial.header', ['title' => 'Masuk ke aplikasi simaru'])
    </div>
    <div class="form-control">
        <label for="" class="label">
            <span class="label-text">Password:</span>
        </label>
        <input type="text" class="input input-bordered" placeholder="input password sikons">
        <label for="" class="label">
            <span class="label-text-alt">Input password untuk masuk ke simaru.</span>
        </label>
    </div>
    <button class="btn btn-primary">
        <x-tabler-send class="icon-5" />
        <span>Masuk ke simaru</span>
    </button>
</div>
