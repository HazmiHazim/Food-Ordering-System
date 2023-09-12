<?php

namespace App\Http\Controllers\Admin\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ItemCategoryController extends Controller
{
    /*
    *  Function to store data category name into item category table
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->only('item_category_name'), [
            'item_category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Retrieve a submitted input of item_category_name
        $validated = $validator->safe()->only('item_category_name');

        // Check if the category name is exists
        $exists = ItemCategory::where('name', $validated)->exists();

        if ($exists) {
            return back()->withErrors([
                'error-message' => 'Category already exists.',
            ]);
        }
        else {
            $itemCreate = ItemCategory::create([
                'name' => $request->item_category_name,
            ]);

            Log::info([$itemCreate]);

            return back()->with('success-message', 'Item Category added successfully.');
        }
    }




    /*
    *  Function to delete resource
    */
    public function destroy($id) : RedirectResponse
    {
        $category = ItemCategory::findOrFail($id);

        $category->delete();

        Log::info([$category]);

        return back()->with('success-message', 'Category is deleted successfully.');
    }
}
