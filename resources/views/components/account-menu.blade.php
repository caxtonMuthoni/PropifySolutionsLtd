<nav class="flex items-center gap-2" aria-label="Account">
    <a href="{{ route('dashboard') }}" @class(['btn-secondary !py-2', '!border-primary-500' => request()->routeIs('dashboard')])>Dashboard</a>
    <a href="{{ route('profile') }}" @class(['btn-secondary !py-2', '!border-primary-500' => request()->routeIs('profile')])>Profile</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-secondary !py-2"><x-icon name="log-out" class="h-4 w-4" /> Log out</button>
    </form>
</nav>
