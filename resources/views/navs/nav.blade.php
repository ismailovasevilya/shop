<ul class="nav justify-content-end">

    @if (auth()->check())
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
    @elseif (!auth()->check())
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
    @endif

</ul>