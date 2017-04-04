<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UploadController extends Controller
{
    public function index()
    {
        return view('fileManager.addFile');
    }

    public function store(Request $request)
    {
        dd($request->file('photo'));

    }
}
