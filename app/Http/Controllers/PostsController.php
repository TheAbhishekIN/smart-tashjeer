<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        $data = array();
        try {
            $posts = $this->database->collection('posts')->documents();

            foreach($posts as $key => $post){
                $data[$key] = $post->data();
                $data[$key]['id'] = $post->id();
                $user = $this->database->collection('users')->document($post->data()['userId'])->snapshot()->data();
                $data[$key]['user']['name'] = $user['name'];
                $data[$key]['user']['image'] = $user['image'];
                $data[$key]['user']['username'] = $user['userName'];
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        return view('posts.index', compact('data'));
    }

    public function show($slug)
    {
        return view('posts.view', compact('slug'));
    }

    public function delete(Request $request)
    {
        $this->database
            ->getReference('test/blogs/' . $request['title'])
            ->remove();

        return response()->json('blog has been deleted');
    }
}
