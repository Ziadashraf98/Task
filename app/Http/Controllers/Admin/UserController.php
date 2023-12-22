<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin' , false)->get();
        return view('admin.users.index' , compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit' , compact('user'));
    }

    public function update($id , UserRequest $request)
    {
        $user = User::find($id);
        
        $validation = $request->validated();
        $validation['password'] = $request->password ? bcrypt($request->password) : $user->password;
        
        $user->update($validation);
        
        return redirect()->route('users.index')->with(['success'=>"you have successfully updated item"]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with(['success'=>"you have successfully deleted item"]);
    }
}
