<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Webpatser\Uuid\Uuid;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $file = $request->all();
        $file['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('cover')) {
            $file['cover'] = $request->cover->getClientOriginalName();
            $request->cover->storeAs('files', $file['cover']);
        }
        File::create($file);
        return redirect()->route('files.index');
    }

    public function download($uuid)
    {
        $file = File::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/files/' . $file->cover);
        return response()->download($pathToFile);
    }
}
