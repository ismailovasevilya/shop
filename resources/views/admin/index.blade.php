@extends('layouts.master')
@section('content')
  {{-- <div class="container mt-5" style="margin-bottom: 200px">
    @if(count($users) > 0)
    <h4 class="text-center mt-4">All users</h4>
    <ul class="list-group">
      @foreach($users as $user)
      <li class="list-group-item">
         <span class="categoryNameStyle">  Name:
          {{$user->name}}</span><br>
        <span class="categoryNameStyle">Email: {{$user->email}}</span>
        
          <a class="float-right" href="{{ route('deleteUser', ['id' => $user->id]) }}">
            <i class="recived-trash-btn mt-1 far fa-lg fa-trash"></i>
          </a>
          
      </li>
      @endforeach
    </ul>
    @else
      <h4 class="text-center mt-4">You have no users</h4>
    @endif
    <div class="pagination-links">
      {{ $users->links() }} --}}
  </div>
  </div>
@endsection