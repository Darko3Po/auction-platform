@extends('layout')
@section('title','Shop')

@section('mainSection')

    <h2>{{ $singleProduct->name }}</h2>

    <img style="width: 300px" src="{{ asset('storage/product_images/'.$singleProduct->image->name) }}" class="card-img-top" alt="...">

    <p>{{ $singleProduct->description }}</p>

    <form action="{{ route('product.bid') }}" method="POST">
    <h5>Minimum price is:    {{ $singleProduct->min_price }} </h5>
        <input required type="number" name="bidPriceAuction" placeholder="Bid price">
        <button class="btn btn-info" type="submit">My Bid price</button>
    </form>

    <form action="/buy-now" method="POST">
    <div style="display: flex">
        <h5 class="">{{ $singleProduct->buy_price }} </h5>
        <input type="hidden" name="buyNowAuction" value="{{ $singleProduct->buy_price }}">
        <button type="submit" class="btn btn-danger">BUY NOW</button>
    </div>
    </form>


@endsection
