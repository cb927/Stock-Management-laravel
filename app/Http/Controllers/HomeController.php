<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $type = auth()->user()->type;
        if ($type == 'customer') {
            return redirect(route('customer.index'));
        } elseif ($type == 'officer') {
            return redirect(route('officer.index'));
        } elseif ($type == 'admin') {
            return redirect(route('admin'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
