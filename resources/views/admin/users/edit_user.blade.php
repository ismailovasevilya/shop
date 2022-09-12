@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input  type="text" name="name" form="postForm" placeholder="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input  type="text" name="email" form="postForm" placeholder="{{ $user->email }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Role</label>
            <input  type="text" name="role" form="postForm" placeholder="{{ $user->role }}">
        </div>
        <form id="postForm" action="{{ route('updateUser', ['id' => $user->id]) }}" method="post">
			@csrf
			<input type="submit" value="Edit">
		</form>
    </div>
@endsection
