@extends('layouts.master', ['categories' => $categories])
@section('content')
    @include('partials.sort')
    <div class="col-sm-8">
        @include('partials.item')
    </div>
@endsection