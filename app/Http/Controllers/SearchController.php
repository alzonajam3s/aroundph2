<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class SearchController extends Controller
{

    public function index(Request $request)
    {

        $query = $request->get('search');
        $blogs = blog::where('body', 'LIKE', "%$query%")->paginate(5);
        
        return view('pages.search', compact('blogs'));
    }   

}
