@extends('layout')
@section('title','Shop')

@section('mainSection')

    <h2>Cart page</h2>

    <form method="POST" action="{{ route('product.finish.shopping') }}">
        {{ csrf_field() }}
        @if ($cartProduct !== NULL)
                <div class="bg-info container m-4 p-4">
                    <span>Product: {{ $cartProduct['productName'] }}</span> |
                    <span>Price: {{ $cartProduct['buyNowAuction'] }}</span>
                    <input type="hidden" name="productName" value="{{ $cartProduct['productName'] }}">
                    <input type="hidden"  name="buyNowPrice" value="{{ $cartProduct['buyNowAuction'] }}">
                </div>
        @endif
       <input type="hidden" name="idProduct" value="{{ session()->get('productId') }}">
        <label> Name </label>
        <input type="text" name="userName" value="{{ Auth::user()->name }}"><br>
        <label> Email </label>
        <input type="text" name="email" value="{{ Auth::user()->email }}"><br>
        <label> Phone </label>
        <input type="text" name="phone" placeholder="+387 --- ---"><br>
        <label> City </label>
        <input type="text" name="city" placeholder="Your city"><br>
        <label> Street </label>
        <input type="text" name="street" placeholder="Your street"><br>
        <button type="submit" class="btn btn-success">BUY NOW</button>
    </form>


@endsection
