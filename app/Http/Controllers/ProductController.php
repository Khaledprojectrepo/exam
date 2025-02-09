<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\Product as ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('merchant_id', auth()->user()->id)->get();
        return view("product.list", compact('products'));
    }

    public function create(Request $request)
    {
        $stores = Store::where('merchant_id', auth()->user()->id)->get();
        $categories = Category::where('merchant_id', auth()->user()->id)->get();
        return view("product.add", compact('stores', 'categories'));
    }

    public function store(ProductRequest $request)
    {
      
     
      $p =  Product::insert([
            'merchant_id' => auth()->user()->id,
            'name' => $request->name,        
            'shop_id' => $request->store_id,
            'category_id' => $request->category_id,
           
        ]);

        return redirect()->route('merchant.product.list')->with('success', 'Product added successfully!');
    }
}
