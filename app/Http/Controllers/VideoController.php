<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\SaveVideoRequest;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:video-list|video-create|video-edit|video-delete', ['only' => ['index','show']]);
        $this->middleware('permission:video-create', ['only' => ['create','store']]);
        $this->middleware('permission:video-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:video-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id;
        $search = $request->search;

        $videos = User::find($id)->videos;
        if ($search != NULL){
            $videos = Video::orderBy('created_at', 'desc')->
            where('title','LIKE',"%{$search}%" )->get();
        }
        $messages = Message::orderBy('created_at','desc')->where('activity', 1)->get();
        $count = $messages->count();
        return view('admin.videos.index', [
            'videos' => $videos,
            'messages' => $messages,
            'count' => $count
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        return view('admin.videos.create', [
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveVideoRequest $request, Video $video)
    {
        $url = $request->video;
        $newurl = 'https://www.youtube.com/embed/';
        for ($i = 17; $i < strlen($url); $i++)
            $newurl = $newurl.$url[$i];
//        dd($newurl);
        $video->title = $request->title;
        $video->video = $newurl;
        $video->user_id = $request->user;
        $video->save();
        return redirect()->route('videos.index')
            ->with('success','Video created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.videos.show', [
           'video' => $video
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(SaveVideoRequest $request, Video $video)
    {
        $video->title = $request->title;
        $video->video = $request->video;
        $video->user_id = $request->user;
        $video->save();
        return redirect()->route('videos.index')
            ->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')
            ->with('success','Video deleted successfully');
    }
}
