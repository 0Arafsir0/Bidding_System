<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
        
            {{-- ✅ Logo --}}
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            {{-- ✅ Main Navigation Links --}}
            <div class="hidden sm:flex sm:items-center space-x-6">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                <x-nav-link :href="route('auction.index')" :active="request()->routeIs('auction.index')">Auctions</x-nav-link>
                <x-nav-link :href="route('auction.create')" :active="request()->routeIs('auction.create')">Create Auction</x-nav-link>
                <x-nav-link :href="route('my.bids')" :active="request()->routeIs('my.bids')">My Bids</x-nav-link>
                <x-nav-link :href="route('leaderboard')" :active="request()->routeIs('leaderboard')">Leaderboard</x-nav-link>
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">About</x-nav-link>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Admin Panel</x-nav-link>
                        <x-nav-link :href="route('admin.settings')" :active="request()->routeIs('admin.settings')">Settings</x-nav-link>
                        <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')">Users</x-nav-link>
                        <x-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')">Reports</x-nav-link>
                        <x-nav-link :href="route('admin.logs')" :active="request()->routeIs('admin.logs')">Logs</x-nav-link>
                        <x-nav-link :href="route('admin.broadcast')" :active="request()->routeIs('admin.broadcast')">Broadcast</x-nav-link>
                        <x-nav-link :href="route('admin.payments')" :active="request()->routeIs('admin.payments')">💳 View Payments</x-nav-link>
                    @endif
                @endauth
            </div>

            {{-- ✅ User Dropdown --}}
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @auth
                                <div>{{ Auth::user()->name }}</div>
                            @endauth
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('user.profile')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>
</nav>
