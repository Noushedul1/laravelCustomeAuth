@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h4 class="p-2">Registration</h4>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" name="password_confirmation">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
