<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleStoreFormRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'articles' => Article::type('video')->take(10)->latest()->get(),
            'text' => Article::type('text')->take(10)->latest()->get()
        ]);
    }

    public function video($file)
    {
        return view('video', ['file' => $file]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleStoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreFormRequest $request)
    {
        $article = Article::create([
            'user_id' => 2,
            'title' =>  $request->input('title'),
            'description' =>  $request->input('description'),
            'file_path' => $request->file('file_path')->getClientOriginalName(),
            'image_path' => $request->file('image_path')->getClientOriginalName(),
            'slug' =>  Str::slug(strtolower($request->input('title')), '-'),
            'type' => $request->input('type')
        ]);

        return redirect()->back()->with('status', 'Article added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }
}
