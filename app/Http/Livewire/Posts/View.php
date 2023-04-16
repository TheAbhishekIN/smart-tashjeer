<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

class View extends Component
{
    public $post;
    public $user;

    public function mount($slug){

        try {

            $database = \App\Services\FirebaseService::connect();

            //get post detail
            $post = $database->collection('posts')->document($slug)->snapshot()->data();

            //get user details
            $this->user = $database->collection('users')->document($post['userId'])->snapshot()->data();
            $this->post = $post;
        } catch (\Throwable $th) {
            return redirect()->route('posts.index')->with('error', 'Something went wrong! please try again leter.');
        }

    }


    public function render()
    {
        return view('livewire.posts.view');
    }
}
