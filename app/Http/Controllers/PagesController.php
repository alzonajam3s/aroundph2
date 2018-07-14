<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Toastr;
use App\Category;
use Illuminate\Support\Facades\Hash;
use App\News;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin'],['only'=>'catlist']);
        $this->middleware(['auth','author'],['only'=>'myblogs']);
        $this->middleware(['auth'],['only'=>'userprofile','editprofile','updateprofile','deleteprofile']);
        $this->middleware(['prevent-back-history'],['only'=>'userprofile','editprofile','updateprofile','deleteprofile','catlist','myblogs']);
    }



    public function userprofile(){
    	$user = User::all();
    	return view('pages.userprofile' , compact('user'));
    }

    public function editprofile($id){
    	$user = User::findOrFail($id);
    	return view('pages.editprofile' , compact('user'));
    }

    public function updateprofile(Request $request, $id){

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->save();
        Toastr::success('User details have been succesfully updated', '', ['options']);
        return redirect('/userprofile/'.$id);
    }

    public function deleteprofile(Request $request , $id){
        $user = User::findOrFail($id);
        $user->delete();
        Toastr::success('Account have been succesfully removed', '', ['options']);
        return redirect('/blogs');
    }

    public function myblogs($name)
    {
        
        $blogs = Blog::latest()->get();
        $users = User::where('name' , $name)->first();
        return view('pages.myblogs' , compact('users','blogs'));

    }


    public function catlist()
    {
        $blog = Blog::all();
        $categories = Category::orderBy('name')->get();
        return view('pages.catlist' , compact('categories'));
    }

    public function aboutme(){
        return view('pages.aboutme');
    }



}
