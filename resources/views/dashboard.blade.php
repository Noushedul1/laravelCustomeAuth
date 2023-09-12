@extends('layouts.app')
@section('title','Home page')
@section('content')
welcome {{ Auth::user()->name }}
@endsection
