<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Food_item;

class CartController extends Controller
{
    public function index()
    {
        $cartitems = Cart::where('table_id', session('table_id'))->get();


        return view('frontend.cart', ['cartitems' => $cartitems]);
    }

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        $item = Food_item::where('id', $product_id)->first();

        if (Cart::where('prod_id', $product_id)->where('table_id', session('table_id'))->exists()) {
            return response()->json(['status' => $item->name . " Already added to cart"]);
        } else {
            $cartItem = new Cart();
            $cartItem->prod_id = $product_id;
            $cartItem->table_id = session('table_id');
            $cartItem->prod_qty = $product_qty;
            $cartItem->save();
            return response()->json(['status' => $item->name . " added to cart"]);
        }
    }

    public function deleteProduct(Request $request)
    {
        $prod_id = $request->input("prod_id");
        $cartitem = Cart::where('table_id', session('table_id'))->where('prod_id', $prod_id)->first();
        $cartitem->delete();
        return response()->json(['status' => "product deleted successfully"]);
    }

    public function checkout()
    {
        $cartitems = Cart::where('table_id', session('table_id'))->get();


        return view('frontend.checkout', ['cartitems' => $cartitems]);
    }
}
