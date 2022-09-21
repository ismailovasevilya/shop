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
            <a href="{{ route('adminOrder') }}" class="nav-link">Orders</a>
        </li>
    </ul>
    <ul class="nav justify-content-end">
        <hr>
    @elseif (auth()->check() || !auth()->check())
        <ul class="nav nav-pills nav-fill ">
            @include('navs.navbar', ['categories' => $categories])
        </ul>
        <hr>
        <div>

            

            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders') }}">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-icon"
                        href="{{ route('cart', ['id' => auth()->check() ? auth()->user()->id : '1']) }}">
                        <p class="order-p">
                            @if (auth()->check() &&
                                !auth()->user()->isAdmin())
                                <i class="fa" style="">&#xf07a;</i>
                            @elseif (!auth()->check())
                                <i class="fa" style="">&#xf07a;</i>
                            @endif
                        </p>
                    </a>
                </li>
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
    {{-- <ul class="nav justify-content-end"> --}}
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
    </div>
    @endif
