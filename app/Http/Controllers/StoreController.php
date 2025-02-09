<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\Store as StoreRequest; 
use DB;
class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::where('merchant_id', auth()->user()->id)->get();
        return view("store.list", compact('stores'));
    }

    public function create(Request $request)
    {
        return view("store.add");
    }

    public function store(StoreRequest $request)
    {
       
        // Generate slug for domain
        $slug = Str::slug($request->store_name, '');

       
        $store = Store::insert([
            'merchant_id' => auth()->user()->id,
            'name' => $request->store_name,
            'domain' => $slug,
        ]);

       
     
            Tenant::create(['id' => $slug]);
            DB::table('domains')->insert(['tenant_id'=>$slug,'domain'=>$slug]);
        

        return redirect()->route('merchant.store.list')->with('success', 'Store created successfully!');
    }

    public function showShop(Request $request){
	
   }
}
