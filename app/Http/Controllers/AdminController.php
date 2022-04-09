<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    /* Process ajax request */
    public function getUsers(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // total number of rows per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

        // Get records, also we have included search filter as well
        $records = User::orderBy($columnName, $columnSortOrder)
            ->where('users.name', 'like', '%' . $searchValue . '%')
            ->orWhere('users.email', 'like', '%' . $searchValue . '%')
            ->select('users.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $sdg_arr = array(DB::table('users')->select(['sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17'])->get());
        //$sdg_arr = DB::table('users')->pluck('sdg1','sdg2','sdg3','sdg4','sdg5','sdg6','sdg7','sdg8','sdg9','sdg10','sdg11','sdg12','sdg13','sdg14','sdg15','sdg16','sdg17');

         foreach ($records as $record) {

            $data_arr[] = array(
                "id" => $record->id,
                "country" => $record->country,
                "name" => $record->name,
                "email" => $record->email,
                "sdg"  => $sdg_arr
            );
    }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );

        echo json_encode($response);
    }
}
