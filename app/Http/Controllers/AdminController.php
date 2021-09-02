<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\VehicleRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $requests = VehicleRequest::all();
        return view('admin.index', compact('requests'));
    }
    
    public function pending_request()
    {
        $requests = VehicleRequest::where('status', 0)->get();

        return view('admin.pendingRequest', compact('requests'));
    }
    
    public function approve_request($id)
    {
        $request = VehicleRequest::find($id);

        $request->status = 1;

        $request->save();

        return redirect(route('admin'));
    }
    
    public function delete_request($id)
    {
        $request = VehicleRequest::find($id);

        $request->delete();

        return redirect(route('admin'));
    }

    public function login()
    {
        return view('admin.login');
    }
    public function register()
    {
        return view('admin.register');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials)) {
            return redirect('admin');
        } else {
            return back();
        }
    }
    public function registerPost(Request $request)
    {
        $type = 'admin';
        $name = $request->name;
        $password = $request->password;
        $email = $request->email;

        User::create([
            'type' => $type,
            'name' => $name,
            'password' => Hash::make($password),
            'email' => $email
        ]);

        return redirect(route('admin.login'));
    }
}
