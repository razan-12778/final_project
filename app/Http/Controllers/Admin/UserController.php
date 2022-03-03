<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => bcrypt($request->password),

        ]);
        return back()->with('success','Admin Added successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email,'.$user->id,
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        if (!empty($student->password) && !empty($student->password_confirmation)) {
            $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return back()->with('success','Admin Edited successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('delete','Admin deleted successfully');
    }
}
