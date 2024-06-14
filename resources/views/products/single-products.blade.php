@extends('layout')
@section('title','Shop')

@section('mainSection')

    <h2>{{ $singleProduct->name }}</h2>

    <img style="width: 300px" src="{{ asset('storage/product_images/'.$singleProduct->image->name) }}" class="card-img-top" alt="...">

    <p>{{ $singleProduct->description }}</p>

    <form action="{{ route('product.bidding') }}" method="POST">
        {{ csrf_field() }}
    <h5>Minimum price is:    {{ $singleProduct->min_price }} </h5>
        <input type="hidden" name="idProduct" value="{{ $singleProduct->id }}">
        <input required type="number" name="bidPriceAuction" placeholder="Bid price">
        <button class="btn btn-info" type="submit">My Bid price</button>
    </form>

    <form action="{{ route('product.buy.now') }}" method="POST">
        {{ csrf_field() }}
    <div style="display: flex">
        <input type="hidden" name="idProduct" value="{{ $singleProduct->id }}">
        <h5 class="">{{ $singleProduct->buy_price }} </h5>
        <input type="hidden" name="buyNowAuction" value="{{ $singleProduct->buy_price }}">
        <button type="submit" class="btn btn-danger">BUY NOW</button>
    </div>
    </form>


@endsection
