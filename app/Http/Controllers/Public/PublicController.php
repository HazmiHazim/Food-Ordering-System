<?php

namespace App\Http\Controllers\Public;

use App\Enums\OrderStatusEnum;
use App\Enums\ReservationStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderDetail;
use App\Models\DiningTable;
use App\Models\FoodMenu;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home() : View
    {
        $menu = FoodMenu::all();

        return view('public.home', compact('menu'));
    }




    /*
    *  Function to view menu file
    */
    public function menu() : View
    {
        $menu = FoodMenu::all();

        return view('public.menu', compact('menu'));
    }




    /*
    *  Function to view about file
    */
    public function about() : View
    {
        return view('public.about');
    }






    /*
    *  Function to view reservation file
    */
    public function reservation() : View
    {
        return view('public.reservation');
    }




    /*
    *  Function for add to cart
    */
    public function createOrder(Request $request) : JsonResponse
    {
        // Retrieve the JSON data from the request
        $cartItem = $request->input('cartData');
        $totalPrice = $request->input('totalAmount');

        // Get table number input
        $tableNumber = $request->input('table_number');

        // Initialize contact as null
        $contact = null;

        // Check if contact field is filled
        if ($request->filled('customer_contact')) {
            $contact = $request->input('customer_contact');
            //dd($contact);
        }

        // Get table record
        $table = DiningTable::where('table_name', $tableNumber)->first();

        // If table not exists
        if (!$table) {
            return response()->json([
                'validation-error-message' => 'Table does not exists. Plese enter a correct table number.',
            ], 422);
        }

        // If table is occupied
        if ($table->isOccupied) {
            return response()->json([
                'validation-error-message' => 'Table is taken. Please enter another table number.',
            ], 422);
        }

        // Table exists and table is not accupied then update isOccupied to true
        $table->update(['isOccupied' => true]);

        // Create order
        $order = CustomerOrder::create([
            'dining_table_id' => $table->id,
            'order_total_price' => $totalPrice,
            'isPaid' => false,
            'order_status' => OrderStatusEnum::Preparing,
            'customer_contact' => $contact,
        ]);

        // Get order id
        $orderId = $order->id;

        foreach ($cartItem as $item) {
            // Create order details
            $orderDetails = CustomerOrderDetail::create([
                'order_id' => $orderId,
                'food_id' => $item['id'],
                'quantity' => $item['quantity'],
                'total_price' => $item['eachTotalPrice'],
            ]);
        }

        Log::info([$table, $order, $orderDetails]);

        return response()->json([
            'success-message' => 'Order is taken. Please wait 15 - 30 minutes for us to prepare your food.',
        ]);
    }



    

    /*
    *  Function for reservation
    */
    public function makeReservation(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|max:255',
            'book_email' => 'required|email',
            'book_phone' => 'required|numeric',
            'guest_number' => 'required|numeric|min:2',
            'book_date' => 'required|date|after:today',
            'book_time' => 'required|date_format:H:i',
            'book_message' => 'max:999999'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Store reservation data
        $reservation = Reservation::create([
            'reservation_name' => $request->book_name,
            'reservation_email' => $request->book_email,
            'reservation_contact' => $request->book_phone,
            'reservation_attendees' => $request->guest_number,
            'reservation_date' => $request->book_date,
            'reservation_time' => $request->book_time,
            'reservation_message' => $request->book_message,
            'dining_table_id' => null,
            'reservation_status' => ReservationStatusEnum::Pending,
        ]);

        Log::info($reservation);

        return back()->with('success-message', 'We have received your reservation. We will process immediately and we will contact you as soon as possible. Thank you.');
    }
}
