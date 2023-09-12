@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h4 class="p-2">Login</h4>
            <form action="{{ route('user.userLogin') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
