<?php

namespace App\Http\Controllers\Admin\FoodMenu;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Models\FoodMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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
    *  Function to search resource in index page
    */
    public function search_index(Request $request) : View
    {
        $keyword = $request->input('search');

        $search = FoodMenu::where(function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orWhere('price', 'like', '%' . $keyword . '%')
            ->orWhere('category_id', 'like', '%' . $keyword . '%')
            ->orWhere('image', 'like', '%' . $keyword . '%');
        })->paginate(10);

        return view('company.admin.food-menu.index', ['food' => $search]);
    }




    

    /*
    *  Function to search reasource in create page
    */
    public function search_create(Request $request) : View
    {
        $keyword = $request->input('search');

        $search = FoodCategory::where(function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('created_at', 'like', '%' . $keyword . '%')
                ->orWhere('updated_at', 'like', '%' . $keyword . '%');
        })->paginate(5);

        Log::info([$keyword, $search]);

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
            'price' => 'required|numeric|decimal:2|min:0.01|max:9999.99',
            'category_id' => 'required|exists:food_categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:10480',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Get the original file name
        $file = $request->file('image');

        // Generate a unique name for the uploaded file
        $fileName = $file->hashName();

        // Store the file with the new name
        $imagePath = $file->storeAs('images/food-menu', $fileName);
        
        $foodMenu = FoodMenu::create([
            'name' => $request->food_name,
            'description' => $request->food_description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        Log::info([$foodMenu]);

        return back()->with('success-message', 'Menu added successfully.');
    }




    /*
    *  Function view show file
    */
    public function show($id) : View
    {
        $menu = FoodMenu::findOrFail($id);

        return view('company.admin.food-menu.show', ['menu' => $menu]);
    }



    
    /*
    *  Function to view edit file
    */
    public function edit($id) : View
    {
        $menu = FoodMenu::findOrFail($id);

        $categoryid = $menu->category_id;

        $menuCategory = FoodCategory::findOrFail($categoryid);

        Log::info([$menu, $menuCategory]);

        return view('company.admin.food-menu.edit', ['menu' => $menu, 'category' => $menuCategory]);
    }

    


    /*
    *  Function to update food menu resource
    */
    public function update(Request $request, $id) : RedirectResponse
    {
        $menu = FoodMenu::findOrFail($id);

        if ($request->anyFilled(['name', 'description', 'price', 'category', 'image'])) {

            $updateData = [];

            if ($request->filled('name')) {
                $updateData['name'] = $request->input('name');
            }

            if ($request->filled('description')) {
                $updateData['description'] = $request->input('description') . " " . $request->input('description-two');
            }

            if ($request->filled('price')) {
                $updateData['price'] = $request->input('price');
            }

            if ($request->filled('category')) {
                $updateData['category'] = $request->input('category');
            }

            if ($request->hasFile('image')) {

                // check if image path exists then delete the path inside storage
                $image = $menu->image;

                if ($image) {
                    Storage::delete($image);
                }

                // Get the original file name
                $file = $request->file('image');

                // Generate a unique name for the uploaded file
                $fileName = $file->hashName();

                // Store the file with the new name
                $imagePath = $file->storeAs('images/food-menu', $fileName);

                $updateData['image'] = $imagePath;
            }

            $updated = $menu->update($updateData);

            Log::info([$updateData, $updated]);

            return redirect()->route('food-menu-show', $menu->id)->with('success-message', 'Your changes are saved successfully.');
        }
        else {
            return back()->withErrors([
                'error-message' => 'Please insert data to update menu.' 
            ]);
        }
    }



    
    /*
    *  Function to delete food menu resource
    */
    public function destroy($id) : RedirectResponse
    {
        $menu = FoodMenu::findOrFail($id);

        // check if image path exists then delete the path inside storage
        $image = $menu->image;

        if ($image) {
            Storage::delete($image);
        }

        $menu->delete();

        Log::info([$menu]);

        return redirect()->route('food-menu')->with('success-message', 'Menu is deleted successfully.');
    }
}
