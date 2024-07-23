@extends('layout')
@section('title','Shop')

@section('mainSection')

    <h2>Cart page</h2>

    <form action="#" method="POST">
        <div class="bg-info container m-4 p-4"> Proizvod: {{ $productName->name}} | Cijena: {{ $idBuyNowAuction }} </div>
        <label> Ime </label>
        <input type="text" value="{{ Auth::user()->name }}"><br>
        <label> Email </label>
        <input type="text" value="{{ Auth::user()->email }}"><br>
        <label> Phone </label>
        <input type="text" placeholder="+387 --- ---"><br>
        <label> City </label>
        <input type="text" placeholder="Your city"><br>
        <label> Street </label>
        <input type="text" placeholder="Your street"><br>

        <button type="submit">Finish</button>
    </form>


@endsection
