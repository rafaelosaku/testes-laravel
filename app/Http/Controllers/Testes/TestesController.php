<?php

namespace App\Http\Controllers\Testes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class TestesController extends Controller
{
    public function calendar()
    {
        return view('testes.index');
    }
}
