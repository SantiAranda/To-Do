<div>
    {{-- <h1>{{$title}}</h1> --}}

    <x-input type="text" wire:model.live='name'/>

    <x-button wire:click='save'>
        Save
    </x-button>

    <p>{{$name}}</p>
</div>
