<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index(){
        $stats = array();

        try {
            $posts = $this->database->collection('posts')->documents()->size();
            $users = $this->database->collection('users')->documents()->size();
            $greenGuides = $this->database->collection('greenGuides')->documents()->size();

            $stats['posts'] = $posts;
            $stats['users'] = $users;
            $stats['greenGuides'] = $greenGuides;

        } catch (\Throwable $th) {

        }


        return view('dashboard', compact('stats'));
    }

}
