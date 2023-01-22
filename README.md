# ckeditor
Implement CK editor.

Route :             Route::post('ckeditor/upload', 'ZoologyController@upload')->name('ckeditor.upload');

Blade : 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/full-all/ckeditor.js"></script> -->
    <!-- <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

</head>
<body>
    <textarea cols="80" id="editor2" name="editor2" rows="10" data-sample-short></textarea>
    
    <script>
        CKEDITOR.replace('editor2', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
</body>
</html>


Controller

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZoologyController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images/pdf/'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/pdf/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
