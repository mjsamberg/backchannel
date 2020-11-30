<x-guest-layout>
    <x-slot name="header">
        <h1 class="text-xl text-gray-800 leading-tight">
            {{ $room->title }}
        </h1>
        <x-jet-validation-errors class="mb-4" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2">
            <div class="bg-white border-red border-4 overflow-y-scroll shadow-xl sm:rounded-lg md:mr-3 h-96">
                
            </div>
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg md:ml-3 mt-3 md:mt-0 p-8">
                <h2>Post a Message</h2>
                <x-form method="" onSubmit="sendMessage">
                    <x-form-input name="name" label="Your Name" />
                    <x-form-textarea name="message" language="en" placeholder="Message" />
                    <x-form-submit />
                </x-form>
            </div>
        </div>
    </div>
</x-guest-layout>
