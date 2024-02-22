<div class="text-center text-sm opacity-50 py-6 grid place-items-center">
    <div class="text-xs breadcrumbs">
        <ul>
            <li>{{ config('app.name') }}</li>
            <li>{{ $user->getRoleNames()->first() }}</li>
            <li>{{ $user->name }}</li>
        </ul>
    </div>
</div>
