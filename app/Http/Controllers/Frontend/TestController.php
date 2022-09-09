<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Bill;
use App\Model\Order;
use App\Model\Size;

use Illuminate\Http\Request;

class TestController extends Controller
{

    
    public function getOrderById(Request $request)
    {

        $order = Order::find($request->input('order_id'));
        $html = "<option value=''>Select a size</option>";
        foreach ($order->sizes as $size) {
            $html .= "<option value='$size->id'>$size->name</option>";
        }
        return $html;
    }

    public function getRateBySize(Request $request)
    {
        $size = Size::find($request->input('size_id'));
        return $size->rate;
    }

    public function getCustomerInfo(Request $request)
    {
        $customerName =  $request->customer_name;
        $date =  $request->date;
        if ($customerName) {
            $bills = Bill::where('name', 'ILIKE', '%' . $request->customer_name . '%')->with('users')->paginate(10);
            $totalBill =  Bill::count();
            return view('frontend.bill.include.searchResult',compact('bills','totalBill'))->render();

        } elseif($date) {
            $bills = Bill::where('ordered_date', 'ILIKE', '%' . $request->date . '%')->orderBy('created_at','DESC')->with('users')->paginate(10);
            $totalBill =  Bill::count();
            return view('frontend.bill.include.searchResult',compact('bills','totalBill'))->render();
        }
        
    }   
}
