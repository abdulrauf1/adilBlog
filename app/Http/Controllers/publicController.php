<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\PaymentPlans;

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

    public function getPlan($id)
    {
        return view('publicRoutes.getPlans');
    }

}
