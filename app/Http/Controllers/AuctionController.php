<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class AuctionController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'idProduct' => 'required|exists:products,id',
            'buyNowAuction' => 'required',
        ]);

        $idProduct = $request->get('idProduct');
        $idBuyNowAuction = $request->get('buyNowAuction');

        $request->session()->put([
            'productId' => $idProduct,
            'buyNowAuction' => $idBuyNowAuction
        ]);

        $productName = Product::where('id', $idProduct)->firstOrFail('name');


         return view('products.cart', compact('idProduct','idBuyNowAuction','productName'));
    }
    public function cartView()
    {
        $test = session()->get('productId');
        dd($test);
    }


    public function buyNow(Request $request)
    {
       //finish cart page and finish purschase


        return view('products.thankYou', compact('cartItems'));
    }


    public function bidding(Request $request)
    {
        dd($request->all());

        return view('products.cart');
    }

}
