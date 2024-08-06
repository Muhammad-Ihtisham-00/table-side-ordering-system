<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FoodItemsController extends Controller
{
    public function index()
    {
        $fooditems = Food_item::orderBy('id', 'DESC')->paginate(10);


        return view('menu.index', ['fooditems' => $fooditems]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('menu.create', ['categories' => $categories]);
    }

    public function store(Request $request)

    {
        $request->validate([
            'name' => 'required',
            'category_name' => 'required',
            'image' => 'sometimes|mimes:png,jpeg,jpg',
            'description' => 'required',
            'price' => 'required',
        ]);

        $fooditem = new Food_item();
        $fooditem->name = $request->name;
        $fooditem->category_id = $request->category_name;
        $fooditem->description = $request->description;
        $fooditem->price = $request->price;
        $fooditem->save();

        if ($request->image) {
            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time() . '.' . $ext;
            $request->image->move(public_path() . '/assets/images/', $newFileName);

            $fooditem->image = $newFileName;
            $fooditem->save();
        }

        if ($fooditem) {
            return redirect()->route('fooditems.index')->with('success', 'Category added successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $fooditem = Food_item::findOrFail($id);
        $categories = Category::all();


        return view('menu.edit', ['fooditem' => $fooditem, 'categories' => $categories]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_name' => 'required',
            'image' => 'sometimes|mimes:png,jpeg,jpg',
            'description' => 'required',
            'price' => 'required',
        ]);

        $fooditem = Food_item::find($id);
        $fooditem->name = $request->name;
        $fooditem->category_id = $request->category_name;
        $fooditem->description = $request->description;
        $fooditem->price = $request->price;
        $fooditem->save();

        if ($request->image) {
            $oldImage = $fooditem->image;

            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time() . '.' . $ext;
            $request->image->move(public_path() . '/assets/images/', $newFileName);

            $fooditem->image = $newFileName;
            $fooditem->save();

            File::delete(public_path() . '/assets/images/' . $oldImage);
        }

        if ($fooditem) {
            return redirect()->route('fooditems.index')->with('success', 'Menu updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function destroy($id, Request $request)
    {
        $fooditem = Food_item::findOrFail($id);
        $fooditem->delete();

        return redirect()->route('fooditems.index')->with('success', 'Menu Item deleted successfully');
    }
}
