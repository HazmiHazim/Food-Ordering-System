<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Models\RestaurantItems;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    public function index() : View
    {
        $restaurantItems = RestaurantItems::paginate(10);

        return view('company.admin.restaurant.index', ['restaurantItems' => $restaurantItems]);
    }

    public function create() : View
    {
        $itemCategory = ItemCategory::paginate(5);

        return view('company.admin.restaurant.create', ['itemCategory' => $itemCategory]);
    }

    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
            'quantity' => 'required|numeric|min:1|max:99999',
            'category_id' => 'required|exists:item_categories,id',
            'item_price' => 'required|numeric|min:0.01|max:9999999.99',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $itemCreate = RestaurantItems::create([
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'item_category_id' => $request->category_id,
            'price' => $request->item_price,
        ]);

        //dd($itemCreate);

        return back()->with('success-message', 'Item added successfully.');
    }
}
