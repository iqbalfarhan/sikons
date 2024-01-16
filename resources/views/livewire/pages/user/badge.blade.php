<div class="flex gap-3">
    <div @class(['avatar', 'placeholder' => !$user->photo])>
        <div class="bg-base-200 text-base-content w-10 rounded-full">
            <img src="{{ $user->avatar }}" alt="">
        </div>
    </div>
    <div class="flex flex-col">
        <div class="text-base font-bold capitalize">{{ $user->name }} {{ session('theme') }}</div>
        <div class="text-xs opacity-75">{{ $user->datel->name }}</div>
    </div>
</div>
