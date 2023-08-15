<?php

namespace App\Http\Controllers\Admin\FoodMenu;

use App\Http\Controllers\Controller;
use App\Models\FoodMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class FoodMenuController extends Controller
{
    public function index() : View
    {
        return view('company.admin.food-menu.index');
    }

    public function create() : View
    {
        return view('company.admin.food-menu.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'food_name' => 'required|max:255',
            'food_description' => 'required|max:9999',
            'price' => 'required|numeric|min:0.01|max:9999.99',
            'category' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:10480',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $foodMenu = FoodMenu::create([
            'food_name' => $request->name,
            'food_description' => $request->description,
            'price' => $request->price,
            'category' => $request->category_id,
            'image' => $request->image,
        ]);

        return back()->with('success-message', 'New menu added successful.');
    }
}
