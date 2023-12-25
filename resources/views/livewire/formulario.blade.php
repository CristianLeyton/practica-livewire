<div>
    {{-- FORMULARIO PARA CREAR POST --}}
    <div class="p-6 mb-4">
        <form wire:submit="save">
            <div class="mb-4">
                <x-label for="">
                    Nombre:
                </x-label>
                <x-input class="w-full" wire:model.live="postCreate.title"/>

                <x-input-error for="postCreate.title"/>
            </div>

            <div class="mb-4">
                <x-label for="">
                    Contenido:
                </x-label>
                <x-textarea class="w-full" wire:model.live="postCreate.content" ></x-textarea>
                <x-input-error for="postCreate.content"/>
            </div>

            <div class="mb-4">
                <x-label>
                    Categoria:
                </x-label>
                <x-select class="w-full" wire:model.live="postCreate.category_id" >
                    <option value="" disabled>
                        Seleccione una categoria
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </x-select>
                <x-input-error for="postCreate.category_id"/>
            </div>

            <div class="mb-4">
                <x-label>
                    Etiquetas:
                </x-label>
                <ul class="w-full flex justify-between">
                    @foreach ($tags as $tag)
                    <li>
                        <label>
                        <x-checkbox wire:model.live="postCreate.selectedTags" value="{{$tag->id}}"/>
                            {{$tag->name}}
                        </label>
                    </li>
                    @endforeach
                </ul>
                <x-input-error for="postCreate.selectedTags"/>
            </div>

            <div class="flex justify-end">
            <x-button>
                CREAR
            </x-button>
            </div>
        </form>
    </div>

    {{-- POST CREADOS --}}
    <span class="font-bold"><p>Posts creados:</p></span>
    <div class="p-3 bg-slate-100 rounded fade">
        @if (!isset($posts[0]))
            <p class="text-center">¡Ningun post creado! Por favor cree uno, en el formulario de arriba. </p>
        @endif
        @foreach ($posts as $post)
        <article class="border p-2 rounded mb-2 bg-white">
            <div class="flex justify-between" wire:key="post-{{$post->id}}">
                <header class="font-bold">{{$post->title}}</header>   
                
                <div class="">
                <x-button wire:click="edit({{$post->id}})">Editar</x-button>
                <x-danger-button wire:click="destroy({{$post->id}})">Eliminar</x-danger-button>
                </div>
            </div>
            <body>
                {{$post->content}}
            </body>
        </article>    
        @endforeach
    </div>

    {{-- MODAL EDITAR CASERO--}}
    {{-- @if ($open)
    <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form wire:submit="update">
                        <div class="mb-4">
                            <x-label for="">
                                Nombre:
                            </x-label>
                            <x-input class="w-full" wire:model="postEdit.title"
                            required/>
                        </div>
            
                        <div class="mb-4">
                            <x-label for="">
                                Contenido:
                            </x-label>
                            <x-textarea class="w-full" wire:model="postEdit.content" required></x-textarea>
                        </div>
            
                        <div class="mb-4">
                            <x-label>
                                Categoria:
                            </x-label>
                            <x-select class="w-full" wire:model="postEdit.category_id" required>
                                <option value="" disabled>
                                    Seleccione una categoria
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </x-select>
                        </div>
            
                        <div class="mb-4">
                            <x-label>
                                Etiquetas:
                            </x-label>
                            <ul class="w-full flex justify-between">
                                @foreach ($tags as $tag)
                                <li>
                                    <label>
                                    <x-checkbox wire:model="postEdit.tags" value="{{$tag->id}}"/>
                                        {{$tag->name}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
            
                        <div class="flex justify-end gap-2">
                            <x-danger-button wire:click="$set('open',false)">
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
    @endif --}}

    {{-- MODAL EDITAR JETSTREAM--}}
    <form wire:submit="update">
        <x-dialog-modal wire:model="postEdit.open">
            <x-slot name="title">
                Actualizar post
            </x-slot>  
            <x-slot name="content">
                    <div class="mb-4">
                        <x-label for="">
                            Nombre:
                        </x-label>
                        <x-input class="w-full" wire:model.live="postEdit.title"/>
                        <x-input-error for="postEdit.title"/>
                    </div>
        
                    <div class="mb-4">
                        <x-label for="">
                            Contenido:
                        </x-label>
                        <x-textarea class="w-full" wire:model.live="postEdit.content"></x-textarea>
                        <x-input-error for="postEdit.content"/>
                    </div>
        
                    <div class="mb-4">
                        <x-label>
                            Categoria:
                        </x-label>
                        <x-select class="w-full" wire:model.live="postEdit.category_id">
                            <option value="" disabled>
                                Seleccione una categoria
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="postEdit.category_id"/>
                    </div>
        
                    <div class="mb-4">
                        <x-label>
                            Etiquetas:
                        </x-label>
                        <ul class="w-full flex justify-between">
                            @foreach ($tags as $tag)
                            <li>
                                <label>
                                <x-checkbox wire:model.live="postEdit.tags" value="{{$tag->id}}"/>
                                    {{$tag->name}}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                        <x-input-error for="postEdit.tags"/>
                    </div>
            </x-slot> 
            <x-slot name="footer">
                <div class="flex justify-end gap-2">
                    <x-danger-button wire:click="$set('postEdit.open',false)">
                        Cancelar
                    </x-danger-button>
                    <x-button>
                        Actualizar
                    </x-button>
                </div>
            </x-slot>          
        </x-dialog-modal>
    </form>
</div>
