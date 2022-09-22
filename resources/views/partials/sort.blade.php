<ul class="nav justify-content-start">
    <li class="nav-item">
        Price
        <form id="postForm" class="inline" action="{{ route('priceUp') }}" method="get">
            @csrf
            <button class="btn no-font" type="submit"><i class="fas fa-regular fa-arrow-up"></i></button>
        </form>
        <form id="postForm" class="inline" action="{{ route('priceDown') }}" method="get">
            @csrf
            <button class="btn no-font mrg" type="submit"><i class="fas fa-regular fa-arrow-down"></i></button>
        </form>
    </li>
    <li class="nav-item">
        Date of creation
        <form id="postForm" class="inline" action="{{ route('dayUp') }}" method="get">
            @csrf
            <button class="btn no-font" type="submit"><i class="fas fa-regular fa-arrow-up"></i></button>
        </form>
        <form id="postForm" class="inline" action="{{ route('dayDown') }}" method="get">
            @csrf
            <button class="btn no-font" type="submit"><i class="fas fa-regular fa-arrow-down"></i></button>
        </form>
    </li>
</ul>