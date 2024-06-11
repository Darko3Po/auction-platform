<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProducts = Product::all();
        return view('.products.allProducts', compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        if ($request->get('buy_price') <= $request->get('min_price'))
        {
            return redirect()->back()->withErrors(['error' => 'Buy now must be high of minimum price.']);
        }
        if ($request->get('date_time') <= Carbon::now())
        {
            return redirect()->back()->withErrors(['error' => 'The date and time must be in the future.']);
        }

        if ($request->hasFile('images'))
        {
            // Name and save image
            $images = $request->file('images');
            $fileName = rand(0, 100).time().'.webp';
            $path = Storage::disk('public')->path('product_images')."/$fileName";
            ImageManager::gd()->read($images)->save($path);
        }




        Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'buy_price' => $request->get('buy_price'),
            'min_price' => $request->get('min_price'),
            'finish_date_auction' => $request->get('date_time'),
            'is_active' => true,
            'user_id' => Auth::id(),
        ]);

        $lastProductId = Product::latest()->first();

        ImageProduct::create([
            'image' => $fileName,
            'product_id' => $lastProductId->id,
        ]);
        return redirect()->route('product.all');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}



