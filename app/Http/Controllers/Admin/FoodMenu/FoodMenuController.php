<?php

namespace App\Http\Controllers\Admin\FoodMenu;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Models\FoodMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class FoodMenuController extends Controller
{
    public function index() : View
    {
        $food = FoodMenu::paginate(10);

        return view('company.admin.food-menu.index', ['food' => $food]);
    }




    /*
    *  Funtion to view create file
    */
    public function create() : View
    {
        $newCategory = FoodCategory::paginate(5);

        return view('company.admin.food-menu.create', ['newCategory' => $newCategory]);
    }




    /*
    *  Function to ssearch reasource in create page
    */
    public function search_create(Request $request) : View
    {
        $keyword = $request->input('search');

        $search = FoodCategory::where(function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('created_at', 'like', '%' . $keyword . '%')
                ->orWhere('updated_at', 'like', '%' . $keyword . '%');
        })->paginate(5);

        return view('company.admin.food-menu.create', ['newCategory' => $search]);
    }


    

    /*
    *  Function to store data into Food Menu table
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'food_name' => 'required|max:255',
            'food_description' => 'required|max:9999',
            'price' => 'required|numeric|min:0.01|max:9999.99',
            'category_id' => 'required|exists:food_categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:10480',
        ]);

        //dd($validator);

        // Get the original file name
        $file = $request->file('image');

        // Generate a unique name for the uploaded file
        $fileName = $file->hashName();

        // Store the file with the new name
        $imagePath = $file->storeAs('public/images', $fileName);

        //dd($imagePath);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator)->withInput();
        }

        //dd($fileName);
        
        $foodMenu = FoodMenu::create([
            'name' => $request->food_name,
            'description' => $request->food_description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return back()->with('success-message', 'Menu added successfully.');
    }
}
