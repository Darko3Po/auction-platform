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

        session()->push('product',[
            'productId' => $idProduct,
            'buyNowAuction' => $idBuyNowAuction,
            'productName' => $productName,
        ]);

         return redirect()->route('product.cart.view');
    }

    public function cartView()
    {
        $cartProducts =  session()->get('product');
        return view('products.cart', compact('cartProducts'));
    }

    public function finishShoping(Request $request)
    {
         $request->validate([
            'idProduct' => 'required|exists:products,id',
            'productName' => 'required|exists:products,name',
            'buyNowAuction' => 'required',
            'userName' => 'required',
            'email' => 'required,exists:users,email',
            'phone' => 'required',
            'city' => 'required',
            'street' => 'required',
        ]);

        return redirect()->route('products.thank.you');
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
