
    @if (auth()->check() &&
        auth()->user()->isAdmin())
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('getUsers') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Orders</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <p>LOGOUT</p>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form> --}}
        </ul>
        @else
            <ul class="nav nav-pills nav-fill">
                @include('navs.navbar')
            </ul>
        
    @endif

    @guest
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="/login">
                    <p>SIGN IN</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">
                    <p>REGISTER</p>
                </a>
            </li>
        </ul>
    @else
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <p>LOGOUT</p>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    @endguest


