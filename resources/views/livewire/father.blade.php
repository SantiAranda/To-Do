<div>
    @persist ('prayer')
        <audio src="{{asset('audios/audio-prueba.mp3')}}" controls></audio>
    @endpersist

    <x-button wire:click="redirigir">
        Ir a prueba
    </x-button>

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

    @push('js')
        <script>
            console.log('hola desde father')
        </script>
    @endpush
</div>
