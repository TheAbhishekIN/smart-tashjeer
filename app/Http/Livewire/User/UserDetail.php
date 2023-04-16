<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDetail extends Component
{

    public $slug;
    public $detail;
    public $confirming = 0;
    public $contributions;

    public function mount($slug){
        $this->slug = $slug;
        try {

            $database = \App\Services\FirebaseService::connect();
            $user = $database->collection('users')->document($slug)->snapshot()->data();
            $contributions = $database->collection('posts')->where('userId', '=', $slug)->documents();

            $posts = array();
            foreach( $contributions as $key => $contri){
                $posts[$key] = $contri->data();
                $posts[$key]['id'] = $contri->id();
            }
            $this->contributions = $posts;
            $this->detail = $user;
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'Something went wrong! please try again leter.');
        }

    }

    public function render()
    {
        return view('livewire.user.user-detail');
    }

    public function confirm($id)
    {
        $this->confirming = $id;
    }

    public function update($id)
    {
        try {
            $status = true;
            if(isset($this->detail['isBlocked']) && $this->detail['isBlocked']){
                $status = false;
            }

            $database = \App\Services\FirebaseService::connect();
            $user = $database->collection('users')->document($this->slug)->set(['isBlocked' => $status], ['merge' => true]);

            if($user){
                $user = $database->collection('users')->document($this->slug)->snapshot()->data();
                $this->detail = $user;
                $this->confirming = 0;
                session()->flash('success', 'User successfully updated.');
            }


        } catch (\Throwable $th) {
            $this->confirming = 0;
            session()->flash('error', 'Something went wrong! please try again.');
        }

    }
}
