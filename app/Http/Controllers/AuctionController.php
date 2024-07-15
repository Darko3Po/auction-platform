<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    public function buyNow(Request $request)
    {
        $request->validate([
            'idProduct' => 'required',
            'buyNowAuction' => 'required',
        ]);

         

        return view('products.thankYou');
    }

    public function bidding(Request $request)
    {
        dd($request->all());

        return view('products.cart');
    }

}
