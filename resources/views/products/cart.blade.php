@extends('layout')
@section('title','Shop')

@section('mainSection')

    <h2>Cart page</h2>

    <form action="{{ route('product.finish.shopping') }}" method="POST">
        {{ csrf_field() }}
        @foreach ($cartProducts as $product )
            <div class="bg-info container m-4 p-4">
                <span>Product: {{ $product['productName'] }}</span> |
                <span>Price: {{ $product['buyNowAuction'] }}</span>
                <input type="hidden" name="productName" value="{{ $product['productName'] }}">
                <input type="hidden"  name="buyNowPrice" value="{{ $product['buyNowAuction'] }}">
            </div>
        @endforeach
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
