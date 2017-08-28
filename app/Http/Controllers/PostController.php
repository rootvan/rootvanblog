<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Carbon::setLocale('tr');
        $posts = Post::latest()->get();
        return view('home')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('root.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'cover' => 'required',
            'category_id' => 'required'
        ]);
        //Request verisini kullanarak yeni bir post oluştur.
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->cover = $request->cover;
        $post->category_id = $request->category_id;



        //Veriyi veritabanına kaydet
        $post->save();
        //Anasayfaya yönlendir
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('root.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'cover' => 'required',
            'category_id' => 'required'
        ]);

        //Post içeriklerini request'e göre güncelle
        $post->title = $request->title;
        $post->content = $request->content;
        $post->cover = $request->cover;
        $post->category_id = $request->category_id;

        //Veriyi veritabanına kaydet
        $post->save();
        //Anasayfaya yönlendir
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
