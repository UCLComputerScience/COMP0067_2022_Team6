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
}
