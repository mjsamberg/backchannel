<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <x-jet-validation-errors class="mb-4" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                @if(count($rooms)>0)
                    <h2>My Rooms</h2>
                    <table class="table-auto border-collspse border border-green w-full">
                        <thead>
                            <tr>
                                <th class="border border-green">Enabled</th>
                                <th class="border border-green">Anonymous</th>
                                <th class="border border-green">Title</th>
                                <th class="border border-green">Slug</th>
                                <th class="border border-green">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $r)
                                <tr>
                                    <td class="border border-green align-content-center">
                                        @if($r->enabled)
                                            <div>
                                                <span class="sr-only">Yes</span><svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="border border-green">
                                        @if($r->anonymous)
                                            <div>
                                                <span class="sr-only">Yes</span><svg class="m-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="border border-green">{{ $r->title }}</td>
                                    <td class="border border-green">{{ $r->slug }}</td>
                                    <td class="border border-green">{{ $r->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <h2 class="mt-3">Create New Room</h2>
                <x-form :action="route('room.create')">
                    <x-form-input name="title" label="Room Title" />
                    <x-form-input name="slug" label="Room code">
                        @slot('help')
                            <small class="form-text text-muted">
                                Users will navigate to {{config('app.url')}}/[your room code].
                            </small>
                        @endslot
                    </x-form-input>
                    <x-form-textarea name="description" language="en" placeholder="Instructions for Use" />

                    <x-form-group>
                        <x-form-checkbox name="anonymous" label="Posts are Anonymous" />
                        <x-form-checkbox name="enabled" label="Room is Enabled" default="checked" />
                    </x-form-group>

                    <x-form-submit />
                </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
