<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::pluck('id','title');

        echo view('dashboard.post.create', compact('categories'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}