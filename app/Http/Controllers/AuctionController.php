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
        $productName = Product::where('id', $idProduct)->get('name')->value('name');

        $product = Product::find($idProduct);
        if(!$product)
        {
            return redirect()->back()->with('error','The product has been sold');
        }

        $productSession = [
            'productId' => $idProduct,
            'buyNowAuction' => $idBuyNowAuction,
            'productName' => $productName,
        ];

        session()->put('product',$productSession);


         return redirect()->route('product.cart.view');
    }

    public function cartView()
    {
        $cartProduct =  session()->get('product');
        return view('products.cart', compact('cartProduct'));
    }

    public function finishShoping(Request $request)
    {

        $sessionProducts = session()->get('product');
        if($sessionProducts['productName'] == NULL || $sessionProducts['buyNowAuction'] == NULL || $sessionProducts['productId'] == NULL)
        {
           return redirect()->back()->with('message', 'Product dosent in cart');

        }
        $request->validate([
            'userName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'street' => 'required'
        ]);

        //LOGIka za save

        return view('products.thankYou');
    }

    public function thankYouPage()
    {
        return view('products.thankYou');
    }

    public function bidding(Request $request)
    {
        dd($request->all());

        return view('products.cart');
    }

}
