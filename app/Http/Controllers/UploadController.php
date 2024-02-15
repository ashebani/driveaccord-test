<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function store(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $originName = $request->file('upload');
            
            $fileName = $originName->getClientOriginalName();
            $folder   = $request->user()->id.$fileName;
            $originName->storeAs(
                'profile/tmp/'.$folder,
                $fileName
            );

            return $folder;

        }

        return '';
    }
}
