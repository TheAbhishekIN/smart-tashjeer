<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

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
            $userPoints = $this->user['points'];
            $status = true;

            if(isset($this->post['isApproved']) && $this->post['isApproved']){
                $status = false;
            }

            if($status){
                $userPoints += $this->post['count'];
            }

            $database = \App\Services\FirebaseService::connect();

            $user = $database->collection('posts')->document($this->slug)->set(['isApproved' => $status], ['merge' => true]);
            $user = $database->collection('users')->document($this->post['userId'])->set(['points' => $userPoints], ['merge' => true]);

            if($user){

                if($status){
                    try {

                        $fcm = \App\Services\FirebaseService::connectFCM();

                        $message = CloudMessage::withTarget('token', $this->user['deviceToken'])
                                        ->withNotification(Notification::create('Post approved', 'You post is approved ,You got '.$this->post['count'].' points'));

                        // Send the message
                        $fcm->send($message);

                    } catch (\Throwable $th) {

                    }
                }

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
