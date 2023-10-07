<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function uploadForm()
    {
        return view('upload');
    }
    public function image()
    {
        // dd("2222");
        $images = Image::all();
        return view('images.index', compact('images'));

    }
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('upload.form')->with('success', 'Image uploaded successfully.');
    }
}
