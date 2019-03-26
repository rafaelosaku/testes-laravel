<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;

class CropController extends Controller
{
    public function index()
    {
        $data['imagem'] = Session::get('img');
        $data['model'] = true;
        return view('crops.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['image' => 'required']);
        
        $input = $request->all();
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move('images', $image_name);

        $image_final = 'images/' . $image_name;

        $inter_image = Image::make($image_final);
        $inter_image->resize(600, null, function($constraint){
            $constraint->aspectRatio();
        });
        $inter_image->save($image_final);
        // dd($image_name);
        Session::put('img', $image_final);
        return redirect()->route('crops.index');
    }
}
