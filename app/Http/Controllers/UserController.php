<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        return view('users', ['users'=>$users]);
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        echo ("User Record deleted successfully.");
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect()->back()->with('status','User Updated Successfully');
    }
}
