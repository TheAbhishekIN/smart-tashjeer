<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
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
            $pages = $this->database->collection('news')->documents();

            foreach($pages as $key => $page){
                $data[$key] = $page->data();
                $data[$key]['id'] = $page->id();
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        return view('news.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('news.create');
    }

    public function edit($slug)
    {
        return view('news.edit', compact('slug'));
    }
}
