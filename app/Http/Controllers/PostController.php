<?php /** @noinspection PhpIncompatibleReturnTypeInspection */

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\SavePostRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','show']]);
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request);
        $search = $request->search;
        $id = Auth::user()->id;
        $role_id = DB::table('model_has_roles')->where('model_id', $id)->first()->role_id;
        $role = Role::find($role_id)->name;
        if ($role === 'Admin')  $post = Post::all()->sortByDesc('id');
        else $post = User::find($id)->posts;
        if ($search != NULL){
            $post = Post::orderBy('created_at', 'desc')->
            where('title','LIKE',"%{$search}%" )->
            orWhere('description','LIKE',"%{$search}%" )->get();
        }


//        dd($post);
        $messages = Message::orderBy('created_at','desc')->where('activity', 1)->get();
        $count = $messages->count();
        return view('admin.posts.index',[
            'posts' => $post,
            'messages' => $messages,
            'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $id = Auth::user()->id;
        return view('admin.posts.create',[
            'categories' => $category,
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
//        dd($request->image);
        if ($request->validated()){
            $post = new Post;
            $image = $request->image;
            $name = time().".".$image->getClientOriginalExtension();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->image = $name;
            $request->image->move('post', $name);
            $post->user_id = $request->user;
            $post->category_id = $request->category;
            $post->save();

            return redirect()->route('posts.index')
                ->with('success','Post created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(SavePostRequest $request, Post $post)
    {
        $count = Post::where('image', $post->image)->get();
        if (File::exists(public_path('post/'.$post->image)) && $count->count() == 1){
            File::delete(public_path('post/'.$post->image));
        }
        $image = $request->image;
        $name = time().".".$image->getClientOriginalExtension();
        $request->image->move('post', $name);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $name;
        $post->user_id = $request->user;
        $post->category_id = $request->category;
        $post->save();

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (File::exists(public_path('post/'.$post->image))){
            File::delete(public_path('post/'.$post->image));
        }
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Product deleted successfully');
    }
}
