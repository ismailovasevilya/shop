@extends('layouts.master')
@section('content')
    <div class="container">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Number of products</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    @if($category->active)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td><a href="{{ route('admin_products_in_category', ['slug' => $category->slug ]) }}">{{ $category->name }}</a></td>
                            <td>{{ $category->description }}</td>
                            @if(auth()->check() && auth()->user()->isAdmin())
                            <td>
                                <a class="float-right" href="{{ route('editCategory', ['slug' => $category->slug]) }}">
                                    <i class="fas fa-lg fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="float-right" href="{{ route('deleteCategory', ['id' => $category->id]) }}">
                                    <i class="recived-trash-btn mt-1 far fa-lg fa-trash"></i>
                                </a>
                            </td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('openNewCategory') }}">Add new category</a>
        @endif
    </div>
@endsection
