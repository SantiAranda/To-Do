<div>
    {{-- @livewire('hijo') --}}

    <x-button class="mb-4" wire:click="$toggle('open')">
        Mostrar / Ocultar
    </x-button>

    <form class="mb-4" wire:submit="save">
        <x-input wire:model="pais" wire:keydown.space="increment" placeholder="Ingrese un pais"/>

        <x-button>Agregar</x-button>
    </form>
    
    @if ($open)
        <ul class="list-disc list-inside space-y-2">
            @foreach ($paises as $index => $pais)
                <li wire:key="pais-{{ $index }}">

                    <span wire:mouseenter="changeActive('{{ $pais }}')">
                        ({{ $index }}) {{ $pais }}
                    </span>

                    <x-danger-button wire:click="delete({{ $index }})">
                        X
                    </x-danger-button>
                </li>
                
            @endforeach
        </ul>
    @endif

    {{$active}}
    {{-- {{$count}} --}}
</div>
