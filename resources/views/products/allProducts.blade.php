@extends('layout')
@section('title','Shop')

@section('mainSection')
    <h1>All Products</h1>

    @foreach($allProducts as $product)
        <p>{{$product->name}}</p>
    @endforeach


    <a class="btn btn-primary" href="{{route('product.add')}}">Add ne auction product</a>
@endsection
