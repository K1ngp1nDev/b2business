<?php


namespace App\Http\Controllers\Admin;


use App\Models\User\User;
use Illuminate\Http\Request;

class UsersController
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function show(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.users.show', [
            'user' => $user
        ]);
    }
}
