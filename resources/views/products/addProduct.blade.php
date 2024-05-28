@extends('layout')
@section('title','Shop')

@section('mainSection')
    <h1>Add product Page</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.upload') }}" method="POST">

        @csrf
        <div class="mb-3">
            <input type="text" name="name" placeholder="Name auction product">
        </div>
        <div class="mb-3">
            <input type="text" name="description" placeholder="Description product">
        </div>
        <div class="mb-3">
            <input type="number" name="buy_price" placeholder="Buy Now Price">
        </div>
        <div class="mb-3">
            <input type="number" name="min_price" placeholder="Start Price">
        </div>
        <div class="mb-3">
            <input type="datetime-local" name="date_time" value="{{\Illuminate\Support\Carbon::now()}}">
        </div>
        <div class="mb-3">
            <input type="file" multiple name="image" class="btn">
        </div>
        <button type="submit" class="btn btn-primary">Create Auction</button>
    </form>

@endsection
