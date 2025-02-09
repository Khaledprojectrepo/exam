<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function index(Request $request){
$user = Auth::user();

// Get the role of the user
$role = $user->roles->pluck('name')->first();

dd($role); // Example Output: "merchant"
		$merchant =  User::role('merchant')->get();
		return view('admi