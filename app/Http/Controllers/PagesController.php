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
        $data = array();
        try {
            $pages = $this->database->collection('greenGuides')->documents();

            foreach($pages as $key => $page){
                $data[$key] = $page->data();
                $data[$key]['id'] = $page->id();
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        return view('pages.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $slug = Str::slug('Terms and conditions');

        $pages = $this->database->collection('greenGuides')->document($slug);
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

}
