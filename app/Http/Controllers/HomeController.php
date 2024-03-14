<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $views = Post::all()->sum('view');
        $categories = Category::all();
        $videos = Video::all();
        $messagess = Message::all();
        $messages = Message::orderBy('created_at','desc')->where('activity', 1)->get();
        $count = $messages->count();
        return view('home',[
            'posts' => $posts,
            'views' => $views,
            'categories' => $categories,
            'videos' => $videos,
            'messagess' => $messagess,
            'messages' => $messages,
            'count' => $count,
        ]);
    }

    public function templates(){
        return view('admin.templates');
    }

    public function save_temp(Request $request){
        $temp = $request->temp;
        Session::put('temp', $temp);
        return redirect()->back()->with('success','Temp inserted successfully');;
    }
}
