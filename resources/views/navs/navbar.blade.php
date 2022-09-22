@foreach ($categories as $category)
    <li class="nav-item ">
        <a class="nav-link category"
            href="{{ route('products_in_category', ['slug' => $category->slug]) }}">{{ $category->name }}
        </a>
    </li>
@endforeach


