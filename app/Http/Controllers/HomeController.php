<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('authRoutes.admin');
    }

    public function myAccount()
    {
        // $users = User::latest()->paginate(5); 
        
        return view('authRoutes.myAccount');
    }


    public function update()
    {
        if(strcmp(auth()->user()->email,request('email')))
        {
            return back()->with("error", "Cannot be Updated Email Already existed!");   
        }
         # Validation
         $data = request()->validate([
            'email' => 'required',
            'name' => 'required',
            'oldPassword' => 'required',
            'newPassword' => 'required',
        ]);


        

        #Match The Old Password
        if(!Hash::check($data['oldPassword'], auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($data['newPassword']),
            'email' => $data['email'],
            'name' => $data['name']
        ]);

        return back()->with("message", "Password Updated Successfully!");
    }

    
    
}
