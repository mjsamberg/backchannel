<x-guest-layout>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  md:mr-3" id="message-list">
                <h2 class="text-4xl font-condensed text-center">Join a Room</h2>
                <div class="flex justify-center">
                    <x-form :action="route('room.display.post')">
                        <x-form-input name="slug" label="Room Code"/>     
                        <x-form-submit class="bg-red">
                            <span class="text-white">Join Room</span>
                        </x-form-submit>   
                    </x-form>
                </div>
                <hr class="mt-5" />
                <div class="text-center justify-center mt-5">
                    <h2 class="text-4xl font-condensed">Create/Manage Rooms</h2>
                    <a class="text-3xl text-red underline hover:no-underline hover:text-reynolds" href="{{ route('dashboard') }}">Dashboard</a>
                </div> 
            </div>
        </div>
    </div>
</x-guest-layout>
