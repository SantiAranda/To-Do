<div>
    <h1 class="text-2xl font-semibold">
        Soy el componente padre
    </h1>

    <x-input wire:model.live="name"/>

    <hr class="my-2">

    <div>
        {{-- @livewire('children', [
            'name' => $name,
        ]) --}}

        @livewire('contador')
    </div>
</div>
