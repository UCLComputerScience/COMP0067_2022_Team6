<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use Webpatser\Uuid\Uuid;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('user/resources', compact('resources'));
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
}
