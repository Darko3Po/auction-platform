<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function buyNow(Request $request)
    {
        dd($request->all());

        return view('products.cart');
    }

    public function bidding(Request $request)
    {
        dd($request->all());

        return view('products.cart');
    }

}
