<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateProfileRequest;

class UserController extends Controller
{
    public function index(){
        return view('users.index')->with('users', User::all());
    }

    public function show(){
        //
    }

    public function create(){
        return view('users.create_edit');
    }

    public function store(CreateUserRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'about' => $request->about
        ]);

        session()->flash('success', 'User successfully added!');

        return redirect(route('users.index'));
    }

    public function edit(User $user){
        return view('users.create_edit')->with('user', $user);
    }

    public function update(UpdateUserRequest $request, User $user){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'about' => $request->about
        ]);

        session()->flash('success', 'User Updated!');

        return redirect()->route('users.index');
    }

    public function destroy(User $user){
        if ($user->id === 1){
            session()->flash('error', 'THIS USER CANNOT BE DELETED!');

            return redirect()->route('users.index');
        }else{
            $user->delete();

            session()->flash('success', 'User was successfully Deleted!');

            return redirect(route('users.index'));
        }
    }

    public function profile(){
        return view('users.profile')->with('user', auth()->user());
    }
    
    public function updateProfile(UpdateProfileRequest $request){
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'about' => $request->about
        ]);

        session()->flash('success', 'Profile Updated!');

        return redirect()->back();
    }
}
