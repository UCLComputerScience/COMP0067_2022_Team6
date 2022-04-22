<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $users = User::sortable()
                ->where('name', 'like', '%'.$filter.'%')
                ->select(User::raw('sdg1', 'sdg2', 'sdg3', 'sdg4', 'sdg5', 'sdg6', 'sdg7', 'sdg8', 'sdg9', 'sdg10', 'sdg11', 'sdg12', 'sdg13', 'sdg14', 'sdg15', 'sdg16', 'sdg17', '=', 'sdg'))
                ->paginate(10);
        } else {
            $users = User::sortable()
                ->paginate(10);
        }

        return view('admin/admin-members')->with('users', $users)->with('filter', $filter);
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        echo ("User Record deleted successfully.");
        return redirect()->route('admin-members.index');
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
