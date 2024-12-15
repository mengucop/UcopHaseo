 <!-- Responsive Navigation Admin Links -->

@if(Auth::user()->role === 'admin')
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link   :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link >
    </div>

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('librarian.accounts')" :active="request()->routeIs('librarian.accounts')">
            {{ __('Librarian Accounts') }}
        </x-responsive-nav-link >
    </div>
@endif

<!-- Responsive Navigation Librarian Links -->

@if(Auth::user()->role === 'librarian')
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('librarian.dashboard')" :active="request()->routeIs('librarian.dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link >
    </div>
@endif

<!-- Responsive Navigation Librarian Links -->

@if((Auth::user()->role == 'admin') or (Auth::user()->role == 'librarian'))
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('user.accounts')" :active="request()->routeIs('user.accounts')">
            {{ __('User Accounts') }}
        </x-responsive-nav-link >
    </div>

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('book.index')" :active="request()->routeIs('book.index')">
            {{ __('Books') }}
        </x-responsive-nav-link >
    </div>

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('request.index')" :active="request()->routeIs('request.index')">
            {{ __('Requests') }}
        </x-responsive-nav-link >
    </div>

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('borrowed.index')" :active="request()->routeIs('borrowed.index')">
            {{ __('Borrowed') }}
        </x-responsive-nav-link >
    </div>
@endif

@if(Auth::user()->role === 'user')
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link >
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('user.books')" :active="request()->routeIs('user.books')">
            {{ __('Books') }}
        </x-responsive-nav-link >
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('user.requests')" :active="request()->routeIs('user.requests')">
            {{ __('Requests') }}
        </x-responsive-nav-link >
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link  :href="route('user.borrowed')" :active="request()->routeIs('user.borrowed')">
            {{ __('Borrowed Books') }}
        </x-responsive-nav-link >
    </div>
@endif


