<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;

class AuthController extends Controller
{
    public function login()
    {

        return view("Auth.login");
    }

    public function registration()
    {
        return view("Auth.register");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have registered successfuly');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not matches.');
            }
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function dashboard(Request $request)
    {
        $data = array();
        if ($request->session()->has('loginId')) {
            $data = User::where('id', '=', $request->session()->get('loginId'))->first();
            $request->session()->put('userName', $data->name);
        }
        $orders = DB::table('orders')->count();
        $pending = DB::table('orders')->where('status', '0')->count();
        $categories = DB::table('categories')->count();
        $items = DB::table('food_items')->count();
        $tables = DB::table('tables')->count();

        return view('dashboard', compact(['orders', 'pending', 'categories', 'items', 'tables']));
    }

    public function logout(Request $request)
    {
        if ($request->session()->has('loginId')) {
            $request->session()->pull('loginId');
            $request->session()->pull('userName');
            return redirect('login');
        }
    }
}
