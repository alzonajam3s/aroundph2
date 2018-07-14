<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Carousel;
use Session;
use App\User;
use App\Mail\BlogPublished;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Toastr;
use App\News;
use App\Article;

class BlogsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin','prevent-back-history'],['only'=>'trash','restore','permanentDelete','publishedupdate','updatedraft']);
        $this->middleware(['auth','author','prevent-back-history'],['only'=>'create','store','edit','update','delete']);
        $this->middleware(['prevent-back-history'],['only'=>'trash','restore','permanentDelete','publishedupdate','updatedraft','create','store','edit','update','delete']);
    }

    public function index(){
        $blogs = Blog::where('status',1)->latest()->paginate(5);
        $carousels = Carousel::all();
        $categories = Category::all();
        $newss = News::latest()->take(3)->get();
        $articles = Article::latest()->take(3)->get();
    	// $blogs = Blog::latest()->get();
    	return view('blogs.index', 
            compact('blogs',
                'carousels',
                'newss',
                'articles',
                'categories'
            ));
    }


    public function create(){
        $categories = Category::orderBy('name')->get();
    	return view('blogs.create' , compact('categories'));
    }

    public function store(Request $request){
        // validate
        $rules = [
            'title'=> ['required','min:10','max:160'],
            'body'=> ['required','min:200'],
            'featured_image'=> ['required'],
        ];
        $this->validate($request, $rules);
        $nameko = Auth::user()->name;
    	$input = $request->all();
        // meta stuff
        $input['slug'] = str_slug($request->title);
        $input['meta_title'] = str_limit($request->title,50);
        $input['meta_description'] = str_limit($request->body,150);



        // image upload
        if($file = $request->file('featured_image')){
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }

    	// $blog = Blog::create($input);
        $blogByUser = $request->user()->blogs()->create($input);
        // sync with categories
        if($request->category_id) {
            $blogByUser->category()->sync($request->category_id);
        }
        Toastr::success('Blog have been succesfully created', '', ['options']);


    	return redirect('/myblogs/'.$nameko);
    }

    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id){
        $categories = Category::orderBy('name')->get();
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog','categories'));
    }

    public function update(Request $request, $id){
        // // validate
        // $rules = [
        //     'title'=> ['required','min:20','max:160'],
        //     'body'=> ['required','min:200'],
        //     'featured_image'=> ['required'],
        // ];
        // $this->validate($request, $rules);
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $status = $request->status;
        $userTest = User::where('role_id', 1);
        $nameko = Auth::user()->name;

        // image upload
        if($file = $request->file('featured_image')){
            if($blog->featured_image){
                unlink('images/featured_image/'.$blog->featured_image);
            }
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }


        $blog->update($input);


        if($request->category_id) {
            $blog->category()->sync($request->category_id);
        }      
// ------------------------------------------------------------ //
        //mail

// ------------------------------------------------------------ //
        Toastr::success('Blog have been succesfully updated', '', ['options']);

        return redirect('/myblogs/'.$nameko);
    }

    public function publishedupdate(Request $request, $id){
        // // validate
        // $rules = [
        //     'title'=> ['required','min:20','max:160'],
        //     'body'=> ['required','min:200'],
        //     'featured_image'=> ['required'],
        // ];
        // $this->validate($request, $rules);
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $status = $request->status;
        $userTest = User::where('role_id', 1);
        $nameko = Auth::user()->name;

        // image upload
        if($file = $request->file('featured_image')){
            if($blog->featured_image){
                unlink('images/featured_image/'.$blog->featured_image);
            }
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }


        $blog->update($input);


        if($request->category_id) {
            $blog->category()->sync($request->category_id);
        }      
// ------------------------------------------------------------ //
        //mail

// ------------------------------------------------------------ //
        Toastr::success('Blog have been succesfully updated', '', ['options']);

        return back();
    }


    public function updatedraft(Request $request, $id){

        $input = $request->all();
        $blog = Blog::findOrFail($id);
        $status = $request->status;

        // image upload
        if($file = $request->file('featured_image')){
            if($blog->featured_image){
                unlink('images/featured_image/'.$blog->featured_image);
            }
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }

        $blog->update($input);

// ------------------------------------------------------------ //
        //mail

        if($status = 1){
            $users = User::all();
            foreach($users as $user){
                Mail::to($user->email)->queue(new BlogPublished($blog, $user));
            }
        }  
// ------------------------------------------------------------ //

        if($request->category_id) {
            $blog->category()->sync($request->category_id);
        }      
        Toastr::success('Blog have been succesfully updated', '', ['options']);

        return back();
    }


    public function delete(Request $request , $id){
        $blog = Blog::findOrFail($id);
        $name = Auth::user()->name;
        $blog->delete();
        Toastr::success('Blog have been temporary deleted', '', ['options']);

        return redirect('/myblogs/'.$name);
    }

    public function trash(){
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', compact('trashedBlogs'));
    }

    public function restore($id){
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        Toastr::success('Blog have been succesfully restored', '', ['options']);

        return redirect('blogs');
    }

    public function permanentDelete($id){
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete();
        Toastr::success('Blog have been pemanently deleted', '', ['options']);

        return back();
    }

}

