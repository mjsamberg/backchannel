@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>{{ config('app.name', 'Laravel') }}</h1>
        <p>{{ config('app.name', 'Laravel') }} is a backchannel chat application that is designed for synchronous "side conversations" during in-person meetings. Think of it as a "private Twitter chat"...</p>
        <p>Getting started is easy! If you have a room name, type in the room code below. No login is required. If you are a meeting organizer, you can go to your <a href="{{route('dashboard')}}" class="text-white" >Dashboard</a> to create new rooms.</p>
        <hr/>
        <form method="post" action="{{ url('room') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="inputlg">Room Code</label>
                <input class="form-control input-lg" id="slug" name="slug" type="text">
            </div>
            <button type="submit" class="btn btn-lg btn-light">Go to Room</button>
        </form>
    </div>
</div>
@endsection
