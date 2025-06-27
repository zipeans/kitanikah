{{-- resources/views/livewire/test-component.blade.php --}}
<div>
    <h1>{{ $message }}</h1>
    <button wire:click="doSomething">Click Me</button>
    @if (session()->has('test_message'))
        <p>{{ session('test_message') }}</p>
    @endif
</div>