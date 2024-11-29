<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Prueba') }}
        </h2>
    </x-slot>

    @persist ('prayer')
        <audio src="{{asset('audios/audio-prueba.mp3')}}" controls></audio>
    @endpersist

    
    @push('js')
        <script>
            console.log('hola desde prueba')
        </script>
    @endpush
</x-app-layout>
