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
        $data['model'] = (Session::get('modal') == null ? 'false' : 'true');
        return view('crops.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['image' => 'required']);

        $input = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move('images', $image_name);

            $image_final = 'images/' . $image_name;

            $inter_image = Image::make($image_final);
            $inter_image->resize(600, null, function($constraint){
                $constraint->aspectRatio();
            });
            $inter_image->save($image_final);
            Session::put('modal', 'true');
        }else{
            $image_final = $request->img_bckp;
        }
        // dd($request->img_bckp);
        Session::put('img', $image_final);
        return redirect()->route('crops.index');
    }

    public function cropImage(Request $request)
    {
        Session::forget('modal');

        $w = intval($request->w);
        $h = intval($request->h);
        $x = intval($request->x);
        $y = intval($request->y);

        $img = Session::get('img');

        $int_img = Image::make($img);
        $int_img->crop($w, $h, $x, $y);
        $int_img->fit(350);
        $int_img->save($img);

        return redirect()->route('crops.index');
    }
}
