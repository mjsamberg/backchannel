<div>
    <x-form wire:submit.prevent="submit">
        @wire
            <x-form-input name="name" label="Your Name" />
            <x-form-textarea name="message" placeholder="Message" />
        @endwire
        <x-form-submit />
    </x-form>
</div>
