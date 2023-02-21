<div>
    <form wire:submit.prevent="submit">
        @csrf
        @if (!$anonymous)
            <div class="mb-2">
                <label for="name"  class="form-label">Your Name</label>
                <input type="text" wire:model="name" class="form-control" id="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        @else
            <input type="hidden" wire:model="name" class="form-control" id="name">
        @endif
        <div class="form-floating mb-2">
            <textarea class="form-control" placeholder="Message" id="message" wire:model="message" style="height: 100px"></textarea>
            <label for="message">Message</label>
            @error('message') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button class="btn btn-primary btn-lg" type="submit">Send</button>
    </form>
</div>
