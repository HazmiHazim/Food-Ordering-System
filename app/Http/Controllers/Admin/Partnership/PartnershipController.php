<?php

namespace App\Http\Controllers\Admin\Partnership;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PartnershipController extends Controller
{
    public function index() : View
    {
        $partner = Partnership::all();

        return view('company.admin.partnership.index', ['partner' => $partner]);
    }





    /*
    *  Function to view create file
    */
    public function create() : View
    {
        return view('company.admin.partnership.create');
    }




    /*
    *  Function to store data into partnership table
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:10480',
            'company_name' => 'required|max:255',
            'owner_name' => 'required|max:255',
            'date' => 'required|date',
            'location' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Get the original file name
        $file = $request->file('image');

        // Generate a unique name for the uploaded file
        $fileName = $file->hashName();

        // Store the file with the new name
        $imagePath = $file->storeAs('images/partnership', $fileName);

        $created = Partnership::create([
            'image' => $imagePath,
            'company_name' => $request->company_name,
            'owner_name' => $request->owner_name,
            'date_join' => $request->date,
            'location' => $request->location,
        ]);

        Log::info([$created]);

        return back()->with('success-message', 'Partner added successfully.');
    }
}
