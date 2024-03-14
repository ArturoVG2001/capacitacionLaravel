<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\post\StoreRequest;

use App\Http\Requests\post\PutRequest;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Routing\Controller;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return to_route("post");
        //return redirect()->route("post.create");
        //return redirect("/post/create");
        //return route("post.create");
        $posts = Post::paginate(2);
        //dd($posts);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $categories = Category::pluck('id','title');
        $post = new Post();
        echo view('dashboard.post.create', compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //echo request('title');
        //echo $request->input('slug');
        //dd( );

        //$validated = $request->validate(StoreRequest::myRules());
        //dd($validated);
        //$request->validate(StoreRequest::myRules());
        
        //$validate = Validator::make($request->all(),StoreRequest::myRules());
        
        //dd($validate->errors());
        //$data = array_merge($request->all(),['image' => '']);
        //dd($data);
        //$data = $request->validated();
        //$data["slug"] = Str::slug($data['titlepos']);
        Post::create($request->validated());
        //dd($data);
        //Post::create($data);
        //dd($request->all());
        return to_route("post")->with('status','Registro creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');
        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data["image"])){
           $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image/otro"), $filename);
        }
        $post->update($data);
        //$request->session()->flash('status','Registro actulizado');
    
        return to_route("post.index")->with('status','Registro actulizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status','Registro eliminado.');
    }
}