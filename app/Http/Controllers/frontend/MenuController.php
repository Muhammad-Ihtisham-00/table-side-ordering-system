<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food_item;

class MenuController extends Controller
{
    public function index($table_id, Request $request)
    {
        $request->session()->put('table_id', $table_id);

        $categories = Category::orderBy('id', 'DESC')->get();
        $liked = Food_item::orderBy('likes', 'DESC')->limit(5)->get();



        return view('frontend.index', compact(['categories', 'liked']));
    }
    public function product($id)
    {
        $fooditem = Food_item::findOrFail($id);


        return view('frontend.product', ['fooditem' => $fooditem]);
    }
}
