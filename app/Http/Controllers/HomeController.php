<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'save', 'manage', 'publish']);
        $this->middleware('auth.admin')->only(['manage', 'publish']);
//        $this->middleware('post.view')->only(['view']);
    }

    public function index()
    {
        $posts = Post::with('user')
            ->where('status', '=', Post::STATUS_PUBLISHED)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('home', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function save(SavePostRequest $request)
    {
        $originalContent = $request->get('content');
        $parsedown = new \Parsedown();

        Post::create([
            'title' => $request->get('title'),
            'content' => $originalContent,
            'parsed_content' => $parsedown->text($originalContent),
            'status' => \Auth::user()->isAdmin() ? Post::STATUS_PUBLISHED : Post::STATUS_PENDING,
            'user_id' => \Auth::user()->id,
        ]);

        \Session::flash('save_success', 1);
        return view('create');
    }

    public function view($id)
    {
        $post = $post = Post::findOrFail($id);

        if ($post) {
            return response()->json([
                'success' => 1,
                'data' => [
                    'title' => $post->title,
                    'content' => $post->parsed_content,
                ]
            ]);
        }

        return response()->json([
            'success' => 0,
        ]);
    }

    public function manage()
    {
        $posts = Post::with('user')
            ->where('status', '=', Post::STATUS_PENDING)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('manage', [
            'posts' => $posts
        ]);
    }

    public function publish(Request $request)
    {
        $postId = $request->get('id');
        $post = Post::findOrFail($postId);

        if ($post && $post->publish()) {
            return response()->json([
                'success' => 1
            ]);
        }

        return response()->json([
            'success' => 0
        ]);
    }
}
