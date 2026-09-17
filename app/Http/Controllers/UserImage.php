<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;

class UserImage extends Controller
{
    public function create(User $user)
    {
        return view('userimage.create', ['user' => $user]);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'alt'   => ['required','string','max:150'],
            'image' => ['required','image','max:3000'],
        ]);

        // Bild in Zielverzeichnis speichern
        $path = $request->file('image')->store('images','public');

        $user->imagepath = $path;
        $user->imagealt  = $request->alt; // $request->input('alt')
        $user->save();

        return redirect('/users')->with('success',"Bild wurde gespeichert!");

    }
}
