<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
            $users = $this->database->collection('users')->documents();

            foreach($users as $key => $user){
                $data[$key] = $user->data();
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        return view('users.index', compact('data'));
    }

    public function show($slug)
    {
        return view('users.show', compact('slug'));
    }

}
