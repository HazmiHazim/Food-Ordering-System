<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Models\RestaurantItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    public function index() : View
    {
        $restaurantItems = RestaurantItem::paginate(10);

        return view('company.admin.restaurant.index', ['restaurantItems' => $restaurantItems]);
    }



    /*
    *  Functio to view create file
    */
    public function create() : View
    {
        $itemCategory = ItemCategory::paginate(5);

        return view('company.admin.restaurant.create', ['itemCategory' => $itemCategory]);
    }




    /*
    *  Function to store data into restaurant item table
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
            'quantity' => 'required|numeric|min:1|max:99999',
            'category_id' => 'required|exists:item_categories,id',
            'item_price' => 'required|numeric|decimal:2|min:0.01|max:9999999.99',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $itemCreate = RestaurantItem::create([
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'item_category_id' => $request->category_id,
            'price' => $request->item_price,
        ]);

        Log::info([$itemCreate]);

        return back()->with('success-message', 'Item added successfully.');
    }




    /*
    *  Function view show file
    */
    public function show($id) : View
    {
        $item = RestaurantItem::findOrFail($id);

        return view('company.admin.restaurant.show', ['item' => $item]);
    }




    /*
    *  Function to view edit file
    */
    public function edit($id) : View
    {
        $item = RestaurantItem::findOrFail($id);

        $categoryid = $item->item_category_id;

        $itemCategory = ItemCategory::findOrFail($categoryid);

        Log::info([$item, $itemCategory]);

        return view('company.admin.restaurant.edit', ['item' => $item, 'category' => $itemCategory]);
    }





    /*
    *  Function to update restaurant item resource
    */
    public function update(Request $request, $id) : RedirectResponse
    {
        $item = RestaurantItem::findOrFail($id);

        if ($request->anyFilled(['item_name', 'quntity', 'category', 'price'])) {

            $updateData = [];

            if ($request->filled('item_name')) {
                $updateData['item_name'] = $request->input('item_name');
            }

            if ($request->filled('quantity')) {
                $updateData['quantity'] = $request->input('quantity');
            }

            if ($request->filled('category')) {
                $updateData['category'] = $request->input('category');
            }

            if ($request->filled('price')) {
                $updateData['price'] = $request->input('price');
            }

            $updated = $item->update($updateData);

            Log::info([$updateData, $updated]);

            return redirect()->route('restaurant-show', $item->id)->with('success-message', 'Your changes are saved successfully.');
        }
        else {
            return back()->withErrors([
                'error-message' => 'Please insert data to update item.'
            ]);
        }
    }




    /*
    *  Function to delete restaurant item resource
    */
    public function destroy($id) : RedirectResponse
    {
        $restaurant = RestaurantItem::findOrFail($id);

        $restaurant->delete();

        Log::info([$restaurant]);

        return redirect()->route('restaurant')->with('success-message', 'Item is deleted successfully.');
    }
}
