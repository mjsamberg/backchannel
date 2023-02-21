<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;

class MessageForm extends Component
{
   public $name;
   public $message;
   public $room_id;
   private $room;

   public function submit(){
       $this->room = Room::where('id', $this->room_id)->firstOrFail();
       if(!$this->room->anonymous){
           $data = $this->validate([
               'name' => 'required',
               'message' => 'required',
           ]);
       }
       else{
           $data = $this->validate([
                  'message' => 'required',
              ]);
              $data['name'] = "";
       }
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
       if(empty($this->name)&&auth()->check()){
           $this->name = auth()->user()->name;
       }
       $this->room = Room::where('id', $this->room_id)->firstOrFail();
       return view('livewire.message-form', array('anonymous' => $this->room->anonymous));
   }
}
