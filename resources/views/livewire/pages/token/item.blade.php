<div class="indicator w-fit"
    wire:click="$dispatch('previewImage', {image: '{{ $token->image ?? url('no-image.jpg') }}'})">
    @if ($token)
        <span class="indicator-item indicator-middle indicator-center badge">{{ $token->pemakaian }}</span>
    @endif
    <div class="avatar">
        <div class="min-w-24 w-fit rounded">
            <img src="{{ $token->image ?? url('no-image.jpg') }}" />
        </div>
    </div>
</div>
