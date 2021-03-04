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
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role'       => 'require|exists:roles,id',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]));
        $role = $user->get('role');
        $User=new User();
        $User->name = $user->name;
        $User->phone = $user->phone;
        $User->password = $user->password;
        $user->assignRole($role);
        if($role==(Spatie\Permission\Models\Role::findByName('admin'))){
            return redirect()->route('admin.show');

        }
        elseif($role==(Spatie\Permission\Models\Role::findByName('onwer'))){
            return redirect()->route('onwer.show');

        }
        elseif($role==(Spatie\Permission\Models\Role::findByName('delivery'))){
            return redirect()->route('delivery.show');

        }
        else{
            return redirect()->route('customer.show');
        }


        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
