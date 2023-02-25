@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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

            <div class="card mb-5">
                <div class="card-header"><h2>My Rooms</h2></div>
                <div class="card-body">
                    @if(count($rooms)>0)
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Enabled</th>
                                    <th>Anonymous</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $r)
                                    <tr>
                                        <td class="text-center">
                                            @if($r->enabled)
                                                <div>
                                                   <a href="{{ route('room.enabled', ['id'=>$r->id]) }}"><span class="fa fa-square-check" style="color: green;" title="Enabled"></span></a>
                                                </div>
                                            @else
                                                <div>
                                                   <a href="{{ route('room.enabled', ['id'=>$r->id]) }}"><span class="fa fa-square-xmark" style="color: red;" title="Disabled"></span></a>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($r->anonymous)
                                                <div>
                                                    <a href="{{ route('room.anonymous', ['id'=>$r->id]) }}"><span class="fa fa-square-check" style="color: green;" title="Anonymous"></span></a>
                                                </div>
                                            @else
                                                <div>
                                                   <a href="{{ route('room.anonymous', ['id'=>$r->id]) }}"><span class="fa fa-square-xmark" style="color: red;" title="Not Anonymous"></span></a>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $r->title }}</td>
                                        <td><a class="underline text-sm text-red hover:text-reynolds underline hover:no-underline" href="{{ config('app.url') }}/{{ $r->slug }}" target="_blank">{{ $r->slug }}</a></td>
                                        <td>{{ $r->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <strong>No rooms found.</strong>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h2>Create New Room</h2></div>
                <div class="card-body">
                    <form method="post" action="{{ route('room.create') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Room Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Room Code</label>
                            <input type="text" name="slug" id="slug" class="form-control" aria-describedby="slughelp">
                            <div id="slughelp" class="form-text">Users will navigate to {{config('app.url')}}/[your room code].</div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Instructions to Users" id="description" style="height: 100px"></textarea>
                            <label for="description">Instructions to Users</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="anonymous" id="anonymous">
                            <label class="form-check-label" for="anonymous">
                                Posts are Anonymous
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="enabled" id="enabled" checked>
                            <label class="form-check-label" for="enabled">
                                Room is Enabled
                            </label>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg">Create Room</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
