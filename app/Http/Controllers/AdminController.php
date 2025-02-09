<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function index(Request $request){

		$merchant =  User::role('merchant')->get();
		return view('admin.dashboard',compact('merchant'));
	}
}