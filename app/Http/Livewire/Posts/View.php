<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

class View extends Component
{
    public $post;
    public $user;
    public $confirming = 0;
    public $slug;

    public function mount($slug){

        try {
            $this->slug = $slug;
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

    public function confirm($id)
    {
        $this->confirming = $id;
    }

    public function update($id)
    {
        try {
            $status = true;
            if(isset($this->post['isApproved']) && $this->post['isApproved']){
                $status = false;
            }

            $database = \App\Services\FirebaseService::connect();
            $user = $database->collection('posts')->document($this->slug)->set(['isApproved' => $status], ['merge' => true]);

            if($user){
                $post = $database->collection('posts')->document($this->slug)->snapshot()->data();
                $this->post = $post;
                $this->confirming = 0;
                session()->flash('success', 'User successfully updated.');
            }


        } catch (\Throwable $th) {
            $this->confirming = 0;
            session()->flash('error', 'Something went wrong! please try again.');
        }

    }
}
