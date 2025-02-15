@extends('test123::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('test123.name') !!}</p>
@endsection
