@extends('layout')
@section('title','Shop')

@section('mainSection')

    <h2>Thank you for your purchase</h2>

@foreach ($cartItems as $item)
<p>{{ $item }}</p>

@endforeach

@endsection
