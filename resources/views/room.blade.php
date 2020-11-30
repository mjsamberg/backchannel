<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-condensed leading-tight">
            {{ $room->title }}
        </h1>
        <p>
            {{$room->description}}
        </p>
        <x-jet-validation-errors class="mb-4" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2">
            <div class="bg-white border-red border-4 overflow-y-scroll shadow-xl sm:rounded-lg md:mr-3 h-96" id="message-list">
                <ul id="messages">
                    @foreach($room->posts as $index=>$p)
                        <li class="p-3 {{ $index%2==1 ? ' bg-gray-100 ' : "" }}">
                            <div class="font-serif font-bold text-lg">{{ $p->message }}</div>
                            <div class="text-sm text-gray-700">Posted by {{ $p->name }}, {{date("m/d/Y g:i a", strtotime($p->posted))}} </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg md:ml-3 mt-3 md:mt-0 p-8">
                <h2>Post a Message</h2>
                @livewire('message-form', array('room_id'=>$room->id))
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        Echo.channel('room{{ $room->id }}')
            .listen('MessagePosted', (e) => {
                var li = document.createElement("li");
                if ((document.getElementById("messages").childElementCount)%2==1)
                    li.setAttribute('class', 'p-3 bg-gray-100');
                else 
                    li.setAttribute('class', 'p-3');
                var div_message = document.createElement('div');
                div_message.setAttribute('class', 'font-serif font-bold text-lg');
                div_message.appendChild(document.createTextNode(e.message.message));

                var div_byline = document.createElement('div');
                div_byline.setAttribute('class', 'text-sm text-gray-700');
                div_byline.appendChild(document.createTextNode('Posted by '+e.message.name+', '+e.message.posted));
                
                li.appendChild(div_message);
                li.appendChild(div_byline);
                document.getElementById("messages").appendChild(li);
                document.getElementById("message-list").scrollTop = document.getElementById("message-list").scrollHeight;
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
    </x-slot>
</x-guest-layout>
