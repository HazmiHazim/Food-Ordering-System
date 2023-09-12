<?php

namespace App\Http\Controllers\Admin\FoodMenu;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FoodCategoryController extends Controller
{
    /*
    *  Function to store data category name into food category table
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->only('new_category'), [
            'new_category' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Retrieve a submitted input of new_category
        $validated = $validator->safe()->only('new_category');

        // Check if the category is exists
        $exists = FoodCategory::where('name', $validated)->exists();

        if ($exists) {
            return back()->withErrors([
                'error-message' => 'Category already exists.'
            ]);
        }
        else {
            $category = FoodCategory::create([
                'name' => $validated['new_category'],
            ]);

            Log::info([$category]);
            
            return back()->with('success-message', 'Food Category added successfully.');
        }
    }




    /*
    *  Function to delete resource
    */
    public function destroy($id) : RedirectResponse
    {
        $category = FoodCategory::findOrFail($id);
        
        $category->delete();

        Log::info([$category]);

        return back()->with('success-message', 'Category is deleted successfully.');
    }
}
