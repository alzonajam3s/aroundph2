<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Toastr;
use App\Blog;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin','prevent-back-history'],['only'=>'create','edit','update','destroy','store']);
        $this->middleware(['prevent-back-history'],['only'=>'create','edit','update','destroy','store']);
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request['name'],
            'slug' => str_slug($request['name'], '-'),
        ]);
        Toastr::success('Category has been succesfully created', '', ['options']);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit' , compact('category'));
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
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name, '-');
        $category->save();
        Toastr::success('Category have been succesfully updated', '', ['options']);
        return redirect('/catlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr::success('Category have been succesfully removed', '', ['options']);
        return back();
    }




}
