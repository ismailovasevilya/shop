@foreach ($categories as $category)
    <li class="nav-item">
        <a class="nav-link"
            href="{{ route('products_in_category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
    </li>
@endforeach
<a class="nav-link nav-icon" href="{{ route('cart', ['id' => auth()->user()->id]) }}">
    <p class="order-p">
        {{-- @if (auth()->check() && auth()->user()->orders) --}}
            <i class="card-icon fas fa-cart-plus ml-1"></i>
            <span class="span-icon"></span>
        {{-- @endif --}}
    </p>
</a>
