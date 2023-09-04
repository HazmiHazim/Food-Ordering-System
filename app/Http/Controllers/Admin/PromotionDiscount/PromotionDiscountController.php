<?php

namespace App\Http\Controllers\Admin\PromotionDiscount;

use App\Enums\CouponStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\PromotionDiscount;
use App\Models\PromotionEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PromotionDiscountController extends Controller
{
    public function index() : View
    {
        $coupon = PromotionDiscount::paginate(10);

        // Send the function to view file
        $backgroundStatus = $this->getStatusStyle($coupon);

        return view('company.admin.promotion-discount.index', ['coupon' => $coupon, 'status' => $backgroundStatus]);
    }




    /*
    *  Function to view create file
    */
    public function create() : View
    {
        $event = PromotionEvent::paginate(5);

        return view('company.admin.promotion-discount.create', ['event' => $event]);
    }




    /*
    *  Function to store data into promotion_discounts table
    */
    public function store(Request $request) : RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'coupon_name' => 'required|max:255',
            'discount' => 'required|numeric|min:0.01|max:1.00',
            'category_id' => 'required|exists:promotion_events,id',
            'validity' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $couponCreate = PromotionDiscount::create([
            'coupon_code' => Str::uuid(),
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount,
            'event_id' => $request->category_id,
            'validity' => $request->validity,
            'redeem_status' => CouponStatusEnum::NotRedeemed,
        ]);

        Log::info([$couponCreate]);

        return back()->with('success-message', 'Coupon created successfully.');
    }





    /*
    *  Function to customize style css of redeem status field
    */
    public function getStatusStyle($status) : string
    {
        $styling = [
            'font-size: 10px', 'padding: 6px 16px', 'color: #F6F6F9', 
            'border-radius: 20px', 'font-weight: 700',
        ];

        switch ($status) {
            case CouponStatusEnum::Redeemed:
                $styling[] = 'background: #388E3C';
                break;

            case CouponStatusEnum::Expired:
                $styling[] = 'background: #D32F2F';
                break;

            case CouponStatusEnum::Cancel:
                $styling[] = 'background: #AAAAAA';
                break;
            
            case CouponStatusEnum::NotRedeemed:
            default:
                $styling[] = 'background: #AAAAAA';
                break;
        }

        return implode(';', $styling);
    }
}
