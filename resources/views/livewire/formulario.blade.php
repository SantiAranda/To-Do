<div>
    <div class="bg-gray-800 shadow rounded-lg p-6 mb-8">
        <form wire:submit="save">
            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>

                <x-input class="w-full" wire:model="title"/>
            </div>
            

            <div class="mb-4">
                <x-label>
                    Contenido
                </x-label>

                <x-textarea class="w-full resize-none" wire:model="content"></x-textarea>
            </div>

            <div class="mb-4">
                <x-label>
                    Categoria
                </x-label>

                <x-select class="w-full" wire:model="category_id">
                    <option hidden>
                        Seleccione una categoría
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>
                    Etiquetas
                </x-label>

                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <x-label>
                                <x-checkbox type="checkbox" wire:model="selectedTags" value="{{$tag->id}}"/> {{$tag->name}}
                            </x-label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear
                </x-button>
            </div>
        </form>
    </div>

    <div class="bg-gray-800 shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
            @foreach ($posts as $post)
                <li class="flex justify-between" wire:key="post-{{$post->id}}">
                    {{$post->title}}

                    <div class="space-x-1">
                        <x-button wire:click="edit({{$post->id}})">
                            Editar
                        </x-button>
    
                        <x-danger-button>
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Formulario de edicion --}}
    @if ($modal)
        <div class="bg-gray-900 bg-opacity-50 fixed inset-0">
            <div class="py-12">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-800 shadow rounded-lg p-6">
                        <form wire:submit="update">
                            <div class="mb-4">
                                <x-label>
                                    Nombre
                                </x-label>
                
                                <x-input class="w-full" wire:model="postEdit.title"/>
                            </div>
                            
                
                            <div class="mb-4">
                                <x-label>
                                    Contenido
                                </x-label>
                
                                <x-textarea class="w-full resize-none" wire:model="postEdit.content"></x-textarea>
                            </div>
                
                            <div class="mb-4">
                                <x-label>
                                    Categoria
                                </x-label>
                
                                <x-select class="w-full" wire:model="postEdit.category_id">
                                    <option hidden>
                                        Seleccione una categoría
                                    </option>
                
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                
                            <div class="mb-4">
                                <x-label>
                                    Etiquetas
                                </x-label>
                
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li>
                                            <x-label>
                                                <x-checkbox type="checkbox" wire:model="postEdit.tags" value="{{$tag->id}}"/> {{$tag->name}}
                                            </x-label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                
                            <div class="flex justify-end space-x-2">
                                <x-danger-button wire:click="$set('modal', false)">
                                    Cancelar
                                </x-danger-button>

                                <x-button>
                                    Actualizar
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    @endif
</div>
