<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index()
    {
        return view('crops.index');
    }
}
