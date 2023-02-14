<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;

class blogController extends Controller
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
        $blogs = Blogs::latest()->get(); 
        return view('authRoutes.myBlogs', compact('blogs'));
    }

    
    public function writeBlog()
    {
        return view('authRoutes.writeBlog');
    }

    public function storeBlog()
    {
        $data = request()->validate([
            'title' => 'required',
            'category' => 'required',
            'desc' => 'required',            
            'booking_attachment' => ['required', 'image'],
        ]);

        $blogImg = request('booking_attachment')->store('uploads','public');

        auth()->user()->blogs()->create([
            'title' => $data['title'],
            'category' => $data['category'],
            'description' => $data['desc'],
            'blogURL' => $blogImg
        ]);


        return redirect('/writeBlog')->with('message', 'Blog Uploaded Successfully!' );

    }

    public function edit($id)
    {
        dd("edit");
        return view('authRoutes.myBlogs');
    }

    public function destroy($id)
    {
        $blogRecord = Blogs::where('id',$id)->first();
        $file = "storage/".$blogRecord->blogURL;

        // dd($newsRecord);
        unlink($file);
        $st = Blogs::where('id',$id)->delete();
        return redirect('/myBlogs')->with('message', 'Blog Deleted Successfully!' );
    }

}
