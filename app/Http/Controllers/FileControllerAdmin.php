<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Webpatser\Uuid\Uuid;

class FileControllerAdmin extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('/admin/admin-projects-detail', compact('files'));
    }

    public function create()
    {
        return view('/admin/admin-projects-detail');
    }

    public function store(Request $request)
    {
        $file = $request->all();
        $file['uuid'] = (string)Uuid::generate();
        $file['project_id'] = $request->project_id;
        if ($request->hasFile('cover')) {
            $file['cover'] = $request->cover->getClientOriginalName();
            $request->cover->storeAs('files', $file['cover']);
        }
        File::create($file);
        $url = url()->previous();
        return redirect($url);
    }

    public function download($uuid)
    {
        $file = File::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/files/' . $file->cover);
        return response()->download($pathToFile);
    }
}