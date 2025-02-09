<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Domain;
use App\Models\Tenant;
use App\Models\Store;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'store_name'=>['required', 'unique:stores,name'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
  	    
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
	$user->assignRole('merchant');
  	$slug = Str::slug($request->store_name, '');      
        $store = Store::insert([
            'merchant_id' => $user->id,
            'name' => $request->store_name,
            'domain' => $slug,
        ]);
        Tenant::create(['id' => $slug]);
        DB::table('domains')->insert(['domain'=>$slug,'tenant_id'=>$slug]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('merchant.dashboard', absolute: false));
    }
}
