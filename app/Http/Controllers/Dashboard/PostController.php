<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\post\StoreRequest;

use App\Http\Requests\post\PutRequest;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Routing\Controller;


class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));
    }

    public function create()
    {        
        $categories = Category::pluck('id','title');
        $post = new Post();
        echo view('dashboard.post.create', compact('categories','post'));
    }

    public function store(StoreRequest $request)
    {
        Post::create($request->validated());
        return to_route("post")->with('status','Registro creado.');
    }

    public function show(Post $post)
    {
        return view("dashboard.post.show",compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');
        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data["image"])){
           $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image/otro"), $filename);
        }
        $post->update($data);
        return to_route("post.index")->with('status','Registro actulizado.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status','Registro eliminado.');
    }
}