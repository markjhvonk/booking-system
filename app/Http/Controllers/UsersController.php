<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::oldest()->get();
        return view('admin.users.index', compact('users'));
    }
    
    public function create()
    {
        return view('admin.users.create');
    }

    public function setPassword($password)
    {
        $this->password = bcrypt($password);
        return $this;
    }

    public function store()
    {
        // Validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'password', 'role'])); //added bcrypt around password for encryption
        $user->password = bcrypt($user->password);
        $user->save();

        // Sign them in? Not for these users!
        // auth()->login($user);

        // Redirect to the home page
        return redirect('/admin/users');
    }

    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(),[
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'confirmed',
            'role'      => 'required'
            
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

    public function delete(Request $request, User $user)
    {
        
        $user->delete();

        return redirect('/admin/users');
    }

    public function search(Request $request)
    {
        $searchQuery = $request->searchQuery;
        $users = User::search($searchQuery)->get();
        return view('admin.users.index', compact('users', 'searchQuery'));
    }
}
