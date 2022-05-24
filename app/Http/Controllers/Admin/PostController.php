<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['id'] = Auth::id();
        $data['user'] = Auth::user();
        $posts = Post::all();

        return view('admin.index', ['data' => $data], compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'max:50',
            'author' => 'max:50',
        ]);
        $data = $request->all();
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->author = $data['author'];
        $newPost->img_url = $data['img_url'];
        $newPost->description = $data['description'];
        $newPost->slug = Str::slug($data['title'],'-');
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost)->with('message', $newPost->title.' created correctly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Category $categories )
    {
        $categories = Category::all();
        return view('admin.edit',compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=> 'required|max:50',
            'author'=> 'required|max:50',
            'description'=>'required'
        ]);

        $data = $request->all();
        $post->update($data);
        /* in questo modo salva solo una delle due categorie inserite*/
        $post->categories()->sync($data['categoria$key']);
        $post->save();
        return redirect()->route('admin.posts.show',$post->id)->with('message', 'post updated correctly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', $post->title.' delete corretly');
    }
}
