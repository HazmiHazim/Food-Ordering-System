<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use App\Models\FoodMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home() : View
    {
        $menu = FoodMenu::all();

        return view('public.home', compact('menu'));
    }




    /*
    *  Function to view menu file
    */
    public function menu() : View
    {
        $menu = FoodMenu::all();

        return view('public.menu', compact('menu'));
    }




    /*
    *  Function to view about file
    */
    public function about() : View
    {
        return view('public.about');
    }




    /*
    *  Function for add to cart
    */
    public function createOrder(Request $request) : RedirectResponse
    {
        // Retrieve the JSON data from the request
        $cartItem = $request->json()->all();

        Log::info($cartItem);
        dd($cartItem);

        foreach ($cartItem['cartData'] as $item) {
            $foodId = $item['id'];
            $image = $item['image'];
            $name = $item['name'];
            $price = $item['price'];
            $quantity = $item['quantity'];

            dd($foodId);
        }

        return back()->with('success-message', 'Order is taken. Please wait 15 - 30 minutes for us to prepare your food.');
    }
}
