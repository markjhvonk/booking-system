<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function editAccount()
    {
        return view('client.profile.edit');
    }
    public function updateAccount(Request $request, User $user)
    {
        $this->validate(request(),[
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'confirmed'
            
        ]);

        if (empty($request->password)) {
            $request = $request->except('password', 'password_confirmation');   // removes the password key from the request if password field is empty
            $user->update($request);                                            // Updates the user with array
        } else {
            $user->update($request->all());                                     // Update user with form request
            $user->password = bcrypt($request->password);                       // Hash new password
            $user->save();
        }

        return back();
    }
}
