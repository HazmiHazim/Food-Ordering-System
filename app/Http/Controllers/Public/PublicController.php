<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use App\Models\FoodMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function addToCart(Request $request, $id) : RedirectResponse
    {
        // Retrieve menu details based on menu id
        $product = FoodMenu::find($id);

        $cart = session()->get('cart', []);

        if (array_key_exists($id, $cart)) {
            $cart[$id]['quantity']++;
        }
        else {
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success-message', 'Product added to cart successfully.');
    }
}
