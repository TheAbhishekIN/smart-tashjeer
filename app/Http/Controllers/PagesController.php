<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Str;

class PagesController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        try {
            $pages = $this->database->collection('pages')->documents();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        return view('pages.index', compact('pages'));
    }

    public function create(Request $request)
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $slug = Str::slug('Terms and conditions');
        // dd($slug);
        $pages = $this->database->collection('pages')->document($slug);
        $pages->set([
            'title' => 'Terms and Conditions',
            'slug' => $slug,
            'published' => true,
            'date' => date('F jS Y \T H:i:s a'),
            'content' => 'This is Terms and Conditions page.'
        ]);
    }

    public function edit($slug)
    {
        return view('pages.edit', compact('slug'));
    }

    public function delete(Request $request)
    {
        $this->database
            ->getReference('test/blogs/' . $request['title'])
            ->remove();

        return response()->json('blog has been deleted');
    }
}
