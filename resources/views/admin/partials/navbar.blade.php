<nav class="bg-white border-b px-6 py-3 flex justify-between items-center">
    <span class="font-semibold text-gray-700">
        @yield('page-title', 'Dashboard')
    </span>

    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle"
                data-bs-toggle="dropdown">
            {{ auth()->user()->name }}
        </button>

        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item text-danger">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
