<?php

namespace App\Http\Controllers\Staff\Order;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use App\Models\DiningTable;
use App\Models\RestaurantItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class OrderControler extends Controller
{
    public function index() : View
    {
        $order = CustomerOrder::with(['diningTable', 'customerOrderDetail.foodMenu'])
        ->where('order_status', OrderStatusEnum::Preparing)->paginate(10);

        return view('company.staff.order.index', ['customerOrder' => $order]);
    }





    /*
    *  Funtion to view create file
    */
    public function create() : View
    {
        $table = DiningTable::paginate(10);

        return view('company.staff.order.create', ['diningTable' => $table]);
    }





    /*
    *  Function to store data of dining table number
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->only('table_number'), [
            'table_number' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Retrieve a submitted input of table_number
        $validated = $validator->safe()->only('table_number');

        $tableName = 'Dining Table';

        // Get dining table
        $diningTable = RestaurantItem::where('item_name', 'like', $tableName)->first();

        // Get quantity
        $tableQuantity = $diningTable->quantity;

        // Get number of table no. registered
        $tableRegistered = DiningTable::count();

        // Check if all dining table is registered or not
        if ($tableRegistered > $tableQuantity) {
            return back()->withErrors([
                'validation-error-message' => 'All table registered already. Cannot registered more than table have.'
            ])->withInput();
        }

        // Check if table_name already exists
        $exists = DiningTable::where('table_name', $validated)->first();

        if ($exists) {
            return back()->withErrors([
                'validation-error-message' => 'Table number is already registered. Please enter other number.'
            ])->withInput();
        }

        $created = DiningTable::create([
            'table_name' => $validated['table_number'],
            'isOccupied' => false,
        ]);

        Log::info($created);

        return back()->with('success-message', 'Table number successfully registered.');
    }





    /*
    *  Function to update order status resource
    */
    public function updateStatus($id) : RedirectResponse
    {   
        // Find order id
        $order = CustomerOrder::findOrFail($id);

        $order->update(['order_status' => OrderStatusEnum::Completed]);

        // Get dining table based on order id
        $diningTable = $order->diningTable;

        $diningTable->update(['isOccupied' => false]);

        Log::info([$order, $diningTable]);

        return back()->with('success-message', 'Order status updated successfully.');
    }
}
