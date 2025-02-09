<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Category as CategoryRequest;

class CategoryController extends Controller
{
    //
	public function index(Request $request){
        
         $categories = Category::where('merchant_id',auth()->user()->id)->get();		
	 return view("category.list",compact('categories'));
	
	}
	public function create(Request $request){
 	$stores = Store::where('merchant_id',auth()->user()->id)->get();
	  return view("category.add",compact('stores'));
	}	
    	public function store(CategoryRequest $request){
    
          	 $slug = Str::slug($request->store_name, "");         
		 Category::insert(['merchant_id'=>auth()->user()->id,'name'=>$request->category_name,'shop_id'=>$request->store_id]);
             
		return redirect(route('merchant.category.list'));

	}
}
