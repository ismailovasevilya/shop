@extends('layouts.master', ['categories' => $categories])
@section('content')
    <div class="col-sm-8">
        <div style="width:100%">
            <h2>{{ $category->name }} - {{ $category->description }}</h2>
        </div>
        <div style="width:100%">
            @include('partials.sort')
        </div>
        <div class="col-sm-8">

            @include('partials.item')
        </div>
    @endsection
