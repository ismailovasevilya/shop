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
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('openNewCategory') }}">Add new category</a>
    </div>
@endsection
