<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ResourceAdmin;
use App\Models\Resource;
use Webpatser\Uuid\Uuid;
use DataTables;

class ResourceControllerAdmin extends Controller
{
    /*
    public function index()
    {
        $resources = Resource::all();
        return view('admin/admin-manage-resources', compact('resources'));
    }
    */

    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $resources = Resource::sortable()
                ->where('resource_title', 'like', '%'.$filter.'%')
                ->paginate(10);
        } else {
            $resources = Resource::sortable()
                ->paginate(10);
        }

        return view('admin/admin-manage-resources')->with('resources', $resources)->with('filter', $filter);
    }

    public function create()
    {
        return view('user/resources');
    }

    public function store(Request $request)
    {
        $resource = $request->all();
        $resource['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('cover')) {
            $resource['cover'] = $request->cover->getClientOriginalName();
            $request->cover->storeAs('resources', $resource['cover']);
        }
        Resource::create($resource);
        return redirect()->route('resources.index');
    }

    public function download($uuid)
    {
        $resource = Resource::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/resources/' . $resource->cover);
        return response()->download($pathToFile);
    }

    public function destroy($uuid)
    {
        $resource = Resource::where('uuid', $uuid)->delete();
        echo ("Resource deleted successfully.");
        return redirect()->route('resources.index');
    }
}
