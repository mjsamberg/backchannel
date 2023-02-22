<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomsController extends Controller
{
    public function dashboard(){
        $rooms = Room::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard', array('rooms'=>$rooms));
    }

    public function create(Request $request){
        $data = $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required|alpha_num|unique:rooms|max:64',
            'description' => '',
            'enabled' => '',
            'anonymous' => '',
        ]);
        print_r($data);
        if(isset($data['enabled'])){
            $enabled = true;
        }
        else $enabled = false;
        if(isset($data['anonymous'])){
            $anonymous = true;
        }
        else $anonymous = false;
        $room = new Room();
        $room->user_id = auth()->user()->id;
        $room->title = $data['title'];
        $room->slug = strtolower($data['slug']);
        if(!empty($data['description']))
            $room->description = strip_tags($data['description']['en']);
        else $room->description = '';
        $room->anonymous = $anonymous;
        $room->enabled = $enabled;
        $room->save();
        return $this->dashboard();
    }

    public function display_room_form(Request $request){
        $data = $request->validate([
            'slug' => 'required|alpha_num|max:64|exists:rooms,slug',
        ]);
        return redirect('/'.$data['slug']);
    }

    public function display_room($slug = ""){
        if(!isset($slug)||$slug==""){
            return view('welcome');
        }

        $room = Room::where('slug', strtolower(strip_tags($slug)))->firstOrFail();
        return view('room', array('room'=>$room));
    }
}
