<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\City;

class MainController extends Controller
{
    function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $data = DB::table('users')
            ->where(['username' => $username])
            ->first();
        if (Hash::check($password, optional($data)->password)) {
          
            $request->session()->put('user', $data);
            
                return redirect('dashboard');
            }
         
        else {
            echo 'error';

            $notification = [
                'message' => 'User Does not Exists!',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function viewcities()
    {
        // $cities = City::all();
        dd('anas'); // Add this line to check if you are getting data
        return view('welcome', ['cities' => $cities]);
    }


}


