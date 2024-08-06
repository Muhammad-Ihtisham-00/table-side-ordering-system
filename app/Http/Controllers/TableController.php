<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::orderBy('table_no', 'DESC')->paginate(10);


        return view('tables.index', ['tables' => $tables]);
    }

    public function create()
    {

        return view('tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_no' => 'required',
        ]);

        $table = new Table();
        $table->table_no = $request->table_no;
        $table->save();

        if ($table) {
            return redirect()->route('tables.index')->with('success', 'Table added successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();

        return redirect()->route('tables.index')->with('success', 'Table deleted successfully');
    }

    public function details($id)
    {
        $table = Table::findOrFail($id);


        return view('tables.details', ['table' => $table]);
    }
}
