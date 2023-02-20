<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessageForm extends Component
{
   public $name;
   public $message;
   public $room_id;

   public function submit(){
       $data = $this->validate([
           'name' => 'required',
           'message' => 'required',
       ]);
       $data['message'] = strip_tags($data['message']);
       $data['room_id'] = $this->room_id;
       $post = new \App\Models\Post();
       $post->name = $data['name'];
       $post->message = strip_tags($data['message']);
       $post->room_id = $this->room_id;
       $post->posted = date('Y-m-d H:i:s');
       $post->save();
       event(new \App\Events\MessagePosted($post));
       $this->message = "";


   }

   public function render()
   {
       return view('livewire.message-form');
   }
}
