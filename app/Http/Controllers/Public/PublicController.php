<?php

namespace App\Http\Controllers\Public;

use App\Enums\OrderStatusEnum;
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
        $cartItem = $request->input('cartData');

        // Check if contact field is filled
        if ($request->filled('customer_contact')) {
            $contact = $request->input('customer_contact');
        }

        Log::info($cartItem);

        foreach ($cartItem as $item) {
            $foodId = $item['id'];
            $image = $item['image'];
            $name = $item['name'];
            $price = $item['price'];
            $quantity = $item['quantity'];
        }

        dd($foodId);

        /*  Insert Data to Customer Order Table
        $order = CustomerOrder::create([
            'dining_table_id' => $request->table_number,
            'order_total_price' => $price,
            'isPaid' => false,
            'order_status' => OrderStatusEnum::Preparing,
            'customer_contacts' => $contact,
        ]);
        */

        return back()->with('success-message', 'Order is taken. Please wait 15 - 30 minutes for us to prepare your food.');
    }
}
