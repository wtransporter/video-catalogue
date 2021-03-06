<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleStoreFormRequest;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

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
        if ($request->hasfile('video')) {
            $file = $request->video->getClientOriginalName();
            $request->video->storeAs($request->type, $request->video->getClientOriginalName());
        }
        if ($request->hasfile('image')) {
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs($request->type, $request->image->getClientOriginalName());
        }


        $article = Article::create([
            'user_id' => auth()->id(),
            'title' =>  $request->input('title'),
            'description' =>  $request->input('description'),
            'video' => $file ?? 'laravel.png',
            'image' => $image ?? 'laravel.png',
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
        return view('edit', compact('article'));
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
        $attributes = $request->all();
        
        if ($request->hasfile('video')) {
            $file = $request->video->getClientOriginalName();
            $attributes['video'] = $file;
            $request->video->storeAs($request->type, $request->video->getClientOriginalName());
        }
        if ($request->hasfile('image')) {
            $image = $request->image->getClientOriginalName();
            $attributes['image'] = $image;
            $request->image->storeAs($request->type, $request->image->getClientOriginalName());
        }

        $article->update($attributes);

        return redirect()->back()->with('status', 'Article updated.');
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
