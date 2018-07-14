<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use App\Category;
use Toastr;
use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin'],['except'=>'show']);
        $this->middleware(['prevent-back-history'],['except'=>'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role_id' , 1)->latest()->get();
        $authors = User::where('role_id' , 2)->latest()->get();
        $subscribers = User::where('role_id' , 3)->latest()->get();
        return view('admin.users' , compact('admins','authors','subscribers'))->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $category = Category::all();
        $user = User::where('name' , $name)->first();
        return view('users.show' , compact('user','category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($request->only('role_id'));
        Toastr::success('User details have been succesfully updated', '', ['options']);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == 1 ) {
            Toastr::error('WARNING!!! Cannot delete ADMIN', '', ['options']);
            return back();

        } else {
            $user->delete();
            Toastr::success('User has been removed from the list', '', ['options']);
            return back();
        }
    }
}
