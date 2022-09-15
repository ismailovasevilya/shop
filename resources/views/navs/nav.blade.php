
@if (auth()->check() &&
    auth()->user()->isAdmin())
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('getUsers') }}">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('getCategories') }}">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('getContent') }}">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Orders</a>
        </li>
    </ul>
@elseif (auth()->check() || !auth()->check())
    <ul class="nav nav-pills nav-fill">
        @include('navs.navbar', ['categories' => $categories])
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
    @endif
