<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getOrderById(Request $request)
    {

        $order=Order::find($request->input('order_id'));
        $html="<option value=''>Select a size</option>";
        foreach ($order->sizes as $size)
        {
            $html.="<option value='$size->id'>$size->name</option>";
        }
        return $html;

    }
}
