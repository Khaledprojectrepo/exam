<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Store;
use App\Models\Product;
class StoreFrontController extends Controller
{
    //
    public function index($shop){
    	$store = Store::with('Category')->where('domain',$shop)->first();
	$shop_name = $store->name ;
       $categories = "";
        
        if($store->Category){
		$categories = $store->Category;
	}
        
        
	return view('storefront.index',compact('shop','shop_name','categories'));
	
    }	
    
    public function product($shop,$category){
      $store = Store::where('domain', $shop)->whereHas('Category', function ($query) use ($category) {
	$query->select('id');
        $query->where('id', $category);
    })
    ->with('Category')
    ->first();
	$shop_name = $store->name ;
        $categories = [];
        $products = "";
        
        if($store->Category){
		$categories = $store->Category()->pluck('id')->toArray();
	}
	$products = Product::whereIn('category_id',$categories)->get();

	return view('storefront.product',compact('shop','shop_name','products'));

	dd($categories);

   }
}
