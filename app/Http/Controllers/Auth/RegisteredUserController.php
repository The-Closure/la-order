<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class RegisteredUserController extends Controller
{
    use HasRoles;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = role::all()->take(-3);
        return view('auth.register', ['roles' => $roles]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //dd();
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role'       => 'required|exists:roles,id',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            //'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]));
        $role = Role::find($request->role);
        $User=new User();
        $User->name = $user->name;
        $User->phone = $user->phone;
        //$User->role_id = $request->role_id;
        $User->email = $user->email;
        $User->password = $user->password;
        $user->assignRole($role);
        
        if($role==(Role::findByName('admin'))){
            return "you are admin";
            return redirect()->route('admin.show');

        }
        elseif($role==(Role::findByName('onwer'))){
            return "you are onwer";
            return redirect()->route('onwer.show');

        }
        elseif($role==(Role::findByName('delivery'))){
            return "you are delivery";
            return redirect()->route('delivery.show');

        }
        else{
            return "you are costumer";
            return redirect()->route('customer.show');
        }


        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
