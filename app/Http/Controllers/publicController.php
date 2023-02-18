<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\PaymentPlans;
use Mail;

class publicController extends Controller
{
    //

    public function index()
    {
        $blogs = Blogs::latest()->get(); 

        $plans = PaymentPlans::get();
        
        return view('publicRoutes.home', compact('blogs','plans'));
    }


    public function about()
    {
        return view('publicRoutes.about');
    }

    public function blogs()
    {
        $blogs = Blogs::simplePaginate(4); 
        $paginator = Blogs::get()->count();
        $pages = ceil($paginator/4);
        
        return view('publicRoutes.blogs', compact('blogs','pages'));
    }

    public function search(Request $request)
    {
         // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $blogs = Blogs::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->simplePaginate(4); 
            
        $paginator = $blogs->count();
        $pages = ceil($paginator/4);
            
        return view('publicRoutes.blogs', compact('blogs','pages'));
    }

    public function blogDeatails($id)
    {

        $blogDetail = Blogs::findOrFail($id);

        $blogs = Blogs::latest()->paginate(3); 
        
        return view('publicRoutes.blogDetails', compact('blogDetail','blogs'));
    }

    public function proceedPayment($id)
    {
        $planDetail = PaymentPlans::findOrFail($id);
        return view('publicRoutes.proceedPayment',compact('planDetail'));
    }

    public function contactUs()
    {
        // $data = request()->validate([
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'email' => 'required|email',
        //     'message' => 'required'
        // ]);
        // Mail::send('mail', [
        //     'name' => $data['firstName'].$data['lastName'],
        //     'email' => $data['email'],
        //     'subject' => "Message from Blog App",
        //     'message' => $data['message'] ],
        //         function ($message) {
        //             $message->from('blogapp.adil@gmail.com');
        //             $message->to('abdulrauf5097911@gmail.com', 'Your Name')
        //             ->subject('sd');
        //         });

        // return redirect('/#contactUs')->with('success', 'Thanks for contacting me, I will get back to you soon!');


        $user = [
            'name' => 'Websolutionstuff',
            'info' => 'This is gmail example in laravel 9'
        ];
    
        \Mail::to('test@example.com')->send(new \App\Mail\GmailTestMail($user));
    
        dd("Successfully send mail..!!");

    }

}
