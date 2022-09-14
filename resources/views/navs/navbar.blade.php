


{{-- <li class="nav-item">
    <a class="nav-link" href="#">Category 1</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Category 2</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Category 3</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Category 4</a>
</li> --}}


@foreach($categories as $category)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products_in_category', ['slug' => $category->slug ]) }}">{{ $category->name}}</a>
    </li>
@endforeach
