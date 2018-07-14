<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Toastr;

class ArticlesController extends Controller
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
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
        $article = Article::create($input);

        Toastr::success('Article have been succesfully added', '', ['options']);


        return redirect('articleslist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
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
        $article = Article::findOrFail($id);

        $article->update($input);

        Toastr::success('Article have been succesfully updated', '', ['options']);

        return redirect('articleslist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        Toastr::success('Article have been succesfully removed', '', ['options']);
        return back();
    }

    public function list()
    {
        $articles = Article::all();
        return view('articles.list' , compact('articles'));
    }

}
