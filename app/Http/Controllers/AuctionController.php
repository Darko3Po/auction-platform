<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Requests\OrdersRequest;
use App\Models\Bidding;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class AuctionController extends Controller
{
    public function addToCart(CartRequest $request)
    {
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

    public function finishShoping(OrdersRequest $request)
    {
        $sessionProducts = session()->get('product');
        if($sessionProducts['productName'] == NULL || $sessionProducts['buyNowAuction'] == NULL || $sessionProducts['productId'] == NULL)
        {
           return redirect()->back()->with('message', 'Product dosent in cart');

        }

       $checkIsActiveProduct = Product::findOrFail($sessionProducts['productId']);
        if ($checkIsActiveProduct['is_active'] !=  1) {
            return redirect()->back()->with('message','The product has been sold');
        }
        // Update products table -> product has been sold
       $checkIsActiveProduct->is_active = 0;
       $checkIsActiveProduct->save();

       $setTypeProductPrice =settype($sessionProducts['buyNowAuction'], 'integer');

        $order = new Orders();
        $order->user_id = Auth::id();
        $order->product_id =  $sessionProducts['productId'];
        $order->price = $setTypeProductPrice;
        $order->save();

        return view('products.thankYou');
    }

    public function thankYouPage()
    {
        return view('products.thankYou');
    }



    public function bidding(Request $request)
    {

        $product = Product::find($request['idProduct']);

        if ($request->bidPriceAuction < $product->min_price) {
           return redirect()->back()->with('error', 'The offered price cannot be less than the minimum');
        }

        $bid = new Bidding();
        $bid->user_id = Auth::id();
        $bid->product_id = $product->id;
        $bid->bid_price = $request->bidPriceAuction;
        $bid->save();


        return view('products.thankYou');
    }

}
