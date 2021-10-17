<div class="w-1/3 justify-end overflow-hidden">
    <div class="text-right">
        @if (Route::has('login'))
        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-xl">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-white text-xl">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-white text-xl">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
</div>