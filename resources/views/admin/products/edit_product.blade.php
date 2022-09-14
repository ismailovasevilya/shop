@extends('layouts.master')
@section('content')
<div class="container">
    <div style="margin: 150px">
        <form action="{{ route('updateProduct', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center">Update Product</h3>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                    <option value="{{ $product->category_id }}">{{ $category->name }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input value="{{ $product->ame }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                @error('food_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input value="{{ $product->description }}" name="description" type="text" class="form-control @error('description') is-invalid @enderror">
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input value="{{ $product->price }}" name="price" type="text" class="form-control @error('price') is-invalid @enderror">
                @error('food_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
            <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input">
                  <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
            </div>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
            <div class="form-group">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
	</div>
</div>
@endsection