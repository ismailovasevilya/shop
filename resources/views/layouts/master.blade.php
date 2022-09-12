<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::to('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        @include('navs.nav')
        <div class="row justify-content-md-center">
            @include('navs.navbar')
            @yield('content')
        </div>
    </div>
    
</body>
</html>