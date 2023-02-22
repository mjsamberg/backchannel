@extends('layouts.app')

@section('content')
    <h1>
        {{ $room->title }}
    </h1>
    <p>
        {{$room->description}}
    </p>

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
        <div class="row">
            <div class="col-xs-12 col-md-6 mr-md-2 mb-md-0 mb-3">
                <div class="card">
                    <div class="card-header"><h2 class="mb-0">Current Messages</h2></div>
                    <div class="card-body p-0" id="message-list" style="height: 30rem; overflow-y: scroll;">
                        <ul class="list-group" id="messages">
                            @foreach($room->posts as $index=>$p)
                                <li class="list-group-item {{ $index%2==1 ? ' bg-dark bg-opacity-10 ' : "" }}">
                                    <div class="message-body">{{ $p->message }}</div>
                                    <div class="message-byline">Posted @if(!$room->anonymous) by {{ $p->name }}, @endif{{date("m/d/Y g:i a", strtotime($p->posted))}} </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 mr-md-2">
                <div class="card">
                    <div class="card-header"><h2 class="mb-0">Post New Message</h2></div>
                    <div class="card-body">
                        @if ($room->enabled)
                            <livewire:message-form :room_id="$room->id">
                        @else
                            This room is currently closed and cannot accept new messages at this time.
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection

@section('scripts')
    <script type="module" language="JavaScript">
        window.onload=function(){
            Echo.channel('room{{ $room->id }}')
            .listen('MessagePosted', (e) => {
                var li = document.createElement("li");
                if ((document.getElementById("messages").childElementCount)%2==1)
                    li.setAttribute('class', 'list-group-item bg-dark bg-opacity-10');
                else
                    li.setAttribute('class', 'list-group-item');
                var div_message = document.createElement('div');
                div_message.setAttribute('class', 'message-body');
                div_message.appendChild(document.createTextNode(e.message.message));

                var div_byline = document.createElement('div');
                div_byline.setAttribute('class', 'message-byline');
                @if($room->anonymous)
                    div_byline.appendChild(document.createTextNode('Posted '+e.message.posted));
                @else
                    div_byline.appendChild(document.createTextNode('Posted by '+e.message.name+', '+e.message.posted));
                @endif

                li.appendChild(div_message);
                li.appendChild(div_byline);
                document.getElementById("messages").appendChild(li);

            });

            var callback = function(){
                var element = document.getElementById("message-list");
                element.scrollTop = element.scrollHeight;
            };

            if (
                document.readyState === "complete" ||
                (document.readyState !== "loading" && !document.documentElement.doScroll)
            ) {
                callback();
            } else {
                document.addEventListener("DOMContentLoaded", callback);
            }
        }
    </script>
@endsection
