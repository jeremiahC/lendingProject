<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function scan($dir){
        $files = array();

        // Is there actually such a folder/file?

        if(file_exists(public_path($dir))){
            foreach(scandir(public_path($dir)) as $f) {

                if(!$f || $f[0] == '.') {
                    continue; // Ignore hidden files
                }

                if(is_dir(public_path($dir . '/' . $f))) {

                    // The path is a folder

                    $files[] = array(
                        "name" => $f,
                        "type" => "folder",
                        "path" => $dir . '/' . $f,
                        "items" => $this->scan($dir . '/' . $f) // Recursively get the contents of the folder
                    );
                }

                else {

                    // It is a file

                    $files[] = array(
                        "name" => $f,
                        "type" => "file",
                        "path" => asset($dir . '/' . $f),
                        "size" => filesize(public_path($dir . '/' . $f)) // Gets the size of this file
                    );
                }
            }
        }

       return array(
            "name" => "files",
            "type" => "folder",
            "path" => $dir,
            "items" => $files
        );
    }

    public function upload(Request $request){
        $file = $request->file('file');
        $fileName = time().$file->getClientOriginalName();
        $file->move(public_path('files'),$fileName);
        return response()->json(['success'=>$fileName]);
    }
}
