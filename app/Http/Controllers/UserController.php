<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Datatables;

//use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return Datatables()->of(User::select('*'))
                ->addColumn('action', function($row) {
                    return '<a href="/edit-user/'.$row->id.' " class="btn btn-primary">Edit</a>';
                })
                ->addColumn('delete', function ($row) {
                    $x = '
                    <form action="{{ route(\'admin-member.destroy\',' . $row->id . ') }}" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</a>
                    </form>
                ';
                    return $x;
                })
                ->rawColumns(['delete' => 'delete','action' => 'action'])
                ->make(true);
        }
        return view('admin-members');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userId = $request->id;

        $user   =   User::updateOrCreate(
            [
                'id' => $userId
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address
            ]);

        return Response()->json($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $user  = User::where($where)->first();

        return Response()->json($user);
    }
    */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $user = User::where('id',$request->id)->delete();

        return Response()->json($user);
    }


    /*
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('email'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            return Str::contains($row['email'], $request->get('email')) ? true : false;
                        });
                    }

                    if (!empty($request->get('search'))) {
                        $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['email']), Str::lower($request->get('search')))){
                                return true;
                            }else if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                                return true;
                            }

                            return false;
                        });
                    }

                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="{{route(edit-user,$row->id)}}" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/admin-members');
    }


    public function index()
    {
        $users = User::All();
        return view('admin/admin-members', ['users'=>$users]);
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        echo ("User Record deleted successfully.");
        return redirect()->route('admin-members.index');
    }
    */



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
