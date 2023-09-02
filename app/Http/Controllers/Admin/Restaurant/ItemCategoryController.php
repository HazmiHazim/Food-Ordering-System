<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemCategoryController extends Controller
{
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->only('item_category_name'), [
            'item_category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check if the category name is exists
        $exists = ItemCategory::where('name', $request->item_category_name)->exists();

        if ($exists == true) {
            return back()->withErrors([
                'error-message' => 'Category is already exists. Please provides others category name.',
            ]);
        }
        else {
            $itemCreate = ItemCategory::create([
                'name' => $request->item_category_name,
            ]);

            return back()->with('success-message', 'Item Category added successfully.');
        }
    }
}
