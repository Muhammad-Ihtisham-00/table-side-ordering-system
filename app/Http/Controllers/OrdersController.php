<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function PlaceOrder()
    {
        $order = new Order();
        $order->table_id = session('table_id');
        $order->tracking_no = rand(1111, 9999);

        $total = 0;
        $cartitems_t = Cart::where('table_id', session('table_id'))->get();
        foreach ($cartitems_t as $item) {
            $total = $total + $item->food_item->price * $item->prod_qty;
        }
        $order->total_price = $total;

        $order->save();

        $cartitems = Cart::where('table_id', session('table_id'))->get();

        foreach ($cartitems as $item) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->prod_id = $item->prod_id;
            $order_item->qty = $item->prod_qty;
            $order_item->price = $item->food_item->price;
            $order_item->save();
        }

        $cartitems = Cart::where('table_id', session('table_id'))->get();
        Cart::destroy($cartitems);

        return redirect()->route('userOrder.show');
    }

    public function userIndex()
    {
        $orders = Order::where('table_id', session('table_id'))->orderBy('created_at', 'DESC')->get();


        return view('frontend.orders', ['orders' => $orders]);
    }

    public function myOrderDetails($id)
    {
        $order = Order::findOrFail($id);


        return view('frontend.order-details', ['order' => $order]);
    }

    public function adminIndex()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);


        return view('orders.index', ['orders' => $orders]);
    }

    public function adminDetails($id)
    {
        $order = Order::findOrFail($id);


        return view('orders.order-details', ['order' => $order]);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input("id");
        $status = $request->input("status");
        $order = Order::where('id', $id)->update(['status' => $status]);
        return response()->json(['status' => "product deleted successfully"]);
    }
}
