<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //
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
        $users = User::latest()->paginate(5); 
        
        return view('authRoutes.manageUsers', compact('users'));
    }

    public function create()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
     
        ]);


        User::create([
            
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['email']),
        ]);
        
        return redirect('/manageUsers')->with('message', 'User Created Successfully!' );

    }

    public function destroy($id)
    {
        
        $st = User::where('id',$id)->delete();
        return redirect('/manageUsers')->with('message', 'User Deleted Successfully!' );
        // dd($st);
    }

}
