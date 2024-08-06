<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food_item;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function addLike(Request $request)
    {
        $product_id = $request->input('product_id');

        $item = Food_item::find($product_id);

        $likes = $item->likes + 1;
        $item->likes = $likes;
        $item->save();
    }
}
