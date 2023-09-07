<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home() : View
    {
        return view('public.home');
    }

    public function menu() : View
    {
        return view('public.menu');
    }

    public function about() : View
    {
        return view('public.about');
    }
}
