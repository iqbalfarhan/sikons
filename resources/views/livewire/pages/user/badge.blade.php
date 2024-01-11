<div class="flex gap-3">
    <div @class(['avatar', 'placeholder' => !$user->photo])>
        <div class="bg-base-200 text-base-content  mask w-10 mask-squircle">
            @if ($user->photo)
                <img src="{{ $user->avatar }}" alt="">
            @else
                <x-tabler-user class="icon-5" />
            @endif
        </div>
    </div>
    <div class="flex flex-col">
        <div class="text-base font-bold capitalize">{{ $user->name }}</div>
        <div class="text-xs opacity-75">{{ $user->datel->name }}</div>
    </div>
</div>
