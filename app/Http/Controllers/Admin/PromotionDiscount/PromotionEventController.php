<?php

namespace App\Http\Controllers\Admin\PromotionDiscount;

use App\Http\Controllers\Controller;
use App\Models\PromotionEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PromotionEventController extends Controller
{
    /*
    *  Function to store data event into item promotion_events table
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->only(['event_name', 'event_date']), [
            'event_name' => 'required|max:255',
            'event_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Retrieve a submitted input of event_name
        $validated = $validator->safe()->only('event_name');

        // Check if the event name is exists
        $exists = PromotionEvent::where('event_name', $validated)->exists();

        if ($exists) {
            return back()->withErrors([
                'error-message' => 'Event name already exists.'
            ]);
        }
        else {
            $eventCreate = PromotionEvent::create([
                'event_name' => $request->event_name,
                'event_date' => $request->event_date,
            ]);

            Log::info([$eventCreate]);

            return back()->with('success-message', 'Event created successfully.');
        }
    }
}
