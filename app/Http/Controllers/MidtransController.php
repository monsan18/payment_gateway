<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;

class MidtransController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    public function checkout(Request $request)
    {
        $order = [
            'order_id' => 'ORDER-' . time(),
            'amount' => $request->amount,
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
        ];

        $snapToken = $this->midtrans->createTransaction($order);

        return response()->json(['token' => $snapToken]);
    }
}
