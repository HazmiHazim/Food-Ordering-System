<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home() : View
    {
        return view('public.home');
    }




    /*
    *  Function to view menu file
    */
    public function menu() : View
    {
        return view('public.menu');
    }




    /*
    *  Function to view about file
    */
    public function about() : View
    {
        return view('public.about');
    }

}
