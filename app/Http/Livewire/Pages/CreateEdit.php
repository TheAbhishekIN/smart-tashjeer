<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Str;

class CreateEdit extends Component
{
    public $title;
    public $published = 0;
    public $content;
    public $slug;
    public function mount($slug = null){
        try {
            if($slug){
                $this->slug = $slug;

                $database = \App\Services\FirebaseService::connect();
                $page = $database->collection('greenGuides')->document($slug)->snapshot();

                $this->title = $page['title'] ?? "";
                $this->published = $page['published'] ?? 1;
                $this->content = $page['description'] ?? "";
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Something went wrong! please try again.');
        }


    }
    public function render()
    {
        return view('livewire.pages.create-edit');
    }

    public function save(){

        try {
            //create firestore instance
            $database = \App\Services\FirebaseService::connect();

            $slug = $this->slug ? $this->slug : Str::slug($this->title);

            $pageData = [
                    'title' => $this->title,
                    'slug' => $slug,
                    'published' => $this->published,
                    'date' => date('F jS Y \T H:i:s a'),
                    'description' => $this->content
                ];

            // Get a document snapshot for a specific page
            $pageRef = $database->collection('greenGuides')->document($slug)->snapshot();

            // Check if the document snapshot exists
            if ($pageRef->exists()) {
                $save = $database->collection('greenGuides')->document($slug)->set($pageData, ['merge' => true]);
                if($save){ session()->flash('success', 'Green Guide successfully updated.'); }
            } else {
                $save = $database->collection('greenGuides')->document($slug)->set($pageData);
                if($save){ session()->flash('success', 'Green Guide successfully saved.'); }
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Something went wrong! please try again.');
        }
    }
}
