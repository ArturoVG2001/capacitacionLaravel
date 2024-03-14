<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;

    public function posts(){
        dd(Category::find(1));

        $posts = Post::paginate(2);
        return $this->belongsTo(Category::class);
    }
}

