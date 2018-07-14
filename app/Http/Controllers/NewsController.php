<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Toastr;
use App\Blog;

class NewsController extends Controller
{
     public function __construct(){
        $this->middleware(['auth','admin'],['only'=>'create','edit','update','destroy','store','list']);
        $this->middleware(['prevent-back-history'],['only'=>'create','edit','update','destroy','store','list']);
    }      
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $newss = News::latest()->get();
        return view('news.index', compact('newss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = [
            'title'=> ['required','min:5','max:160'],
            'body'=> ['required','min:100'],
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $news = News::create($input);

        Toastr::success('News have been succesfully added', '', ['options']);


        return redirect('newslist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news','blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
        
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
        $input = $request->all();
        $news = News::findOrFail($id);

        $news->update($input);

        Toastr::success('News have been succesfully updated', '', ['options']);

        return redirect('newslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        Toastr::success('News have been succesfully removed', '', ['options']);
        return back();
    }

    public function list()
    {
        $newss = News::all();
        return view('news.list' , compact('newss'));
    }

    
}
