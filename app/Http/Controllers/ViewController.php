<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\Session;

class ViewController extends Controller
{
    public function index(){
        $temp = Session::get('temp', 'news24');
        $last_id = Post::all()->count();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $main_posts = Post::orderBy('created_at', 'desc')->latest()->take(5)->get();
        $mosts = Post::orderBy('view', 'desc')->latest()->take(5)->get();
        $categories = Category::all();
        $videos = Video::all()->sortByDesc('created_at');
        $last_posts = Post::orderBy('updated_at', 'desc')->paginate(9);
        return view($temp.'.index',[
            'mainposts' => $main_posts,
            'posts' => $posts,
            'mosts' => $mosts,
            'categories' => $categories,
            'videos' => $videos,
            'lasts' => $last_posts,
            'id' => $last_id
        ]);
    }

    public function blog($id = NULL){
        $temp = Session::get('temp', 'news24');
        $last_id = Post::all()->count();
        if ($id != NULL)
            $posts = Post::select("*")
                ->where("category_id", $id)
                ->orderBy("created_at", "desc")
                ->paginate(5);
        else $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $mosts = Post::orderBy('view', 'desc')->latest()->take(5)->get();
        $categories = Category::all();
        $last_posts = Post::orderBy('updated_at', 'desc')->paginate(9);
        return view($temp.'.blog',[
            'mosts' => $mosts,
            'posts' => $posts,
            'categories' => $categories,
            'lasts' => $last_posts,
            'id' => $last_id
        ]);
    }

    public function single($id){
        $temp = Session::get('temp', 'news24');
        $post = Post::find($id);
        $post->increment('view', 1);
        $mosts = Post::orderBy('view', 'desc')->latest()->take(5)->get();
        $categories = Category::all();
        $last_posts = Post::orderBy('updated_at', 'desc')->paginate(9);
        return view($temp.'.single', [
            'post' => $post,
            'mosts' => $mosts,
            'lasts' => $last_posts,
            'categories' => $categories
        ]);
    }

    public function contact(){
        $temp = Session::get('temp', 'news24');
        $last_id = Post::all()->count();
        $categories = Category::all();
        $mosts = Post::orderBy('view', 'desc')->latest()->take(5)->get();
        $last_posts = Post::orderBy('updated_at', 'desc')->paginate(9);
        return view($temp.'.contact', [
            'id' => $last_id,
            'categories' => $categories,
            'mosts' => $mosts,
            'lasts' => $last_posts
        ]);
    }
}
