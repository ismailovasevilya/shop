<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::to('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            
            {{-- <h1>{{ $categories->count()}}</h1> --}}
           
            @include('navs.nav', ['categories'=>$categories])
        </div>
        <div class="row justify-content-md-center">
            {{-- @include('navs.navbar') --}}
            @yield('content')
        </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>