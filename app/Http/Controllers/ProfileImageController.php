<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileImageController extends Controller
{
    //
    public function update(Request $request, User $user)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time().'.'.$request->image->extension();
        $request->image->storeAs(
            'public/images',
            $fileName
        );

        $user->image = $fileName;

        return Redirect::back();

    }
}
