<?php

namespace App\Http\Livewire\News;

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
                $page = $database->collection('news')->document($slug)->snapshot();

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
        return view('livewire.news.create-edit');
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
            $pageRef = $database->collection('news')->document($slug)->snapshot();

            // Check if the document snapshot exists
            if ($pageRef->exists()) {
                $save = $database->collection('news')->document($slug)->set($pageData, ['merge' => true]);
                if($save){ session()->flash('success', 'News successfully updated.'); }
            } else {
                $save = $database->collection('news')->document($slug)->set($pageData);
                if($save){ session()->flash('success', 'News successfully saved.'); }
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Something went wrong! please try again.');
        }
    }
}

