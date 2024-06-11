@extends('layout')
@section('title','Shop')

@section('mainSection')
    <h1>All Products</h1>
    @foreach($allProducts as $product)
        <div class="card" style="width: 18rem; display: inline-block;margin: 1rem;">
            <img src="{{ asset('storage/product_images/'.$product->image->name) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4>{{$product->name}}</h4>
                <h4>{{$product->product}}</h4>
                <p class="card-text"> {{$product->description}}</p>
            </div>
        </div>
    @endforeach
    <hr> <a class="btn btn-primary" href="{{route('product.add')}}" style="margin: 1rem">Add ne auction product</a>
@endsection
