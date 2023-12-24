<div>
    <div class="p-6 mb-4">
        <form wire:submit="save">
            <div class="mb-4">
                <x-label for="">
                    Nombre:
                </x-label>
                <x-input class="w-full" wire:model="title"
                required/>
            </div>

            <div class="mb-4">
                <x-label for="">
                    Contenido:
                </x-label>
                <x-textarea class="w-full" wire:model="content" required></x-textarea>
            </div>

            <div class="mb-4">
                <x-label>
                    Categoria:
                </x-label>
                <x-select class="w-full" wire:model="category_id" required>
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
                        <x-checkbox wire:model="selectedTags" value="{{$tag->id}}"/>
                            {{$tag->name}}
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-end">
            <x-button>
                CREAR
            </x-button>
            </div>
        </form>
    </div>

    <span class="font-bold"><p>Posts creados:</p></span>
    <div class="p-3 bg-slate-100 rounded fade">
        @if (!isset($posts[0]))
            <p class="text-center">¡Ningun post creado! Por favor cree uno, en el formulario de arriba. </p>
        @endif
        @foreach ($posts as $post)
        <article class="border p-2 rounded mb-2 bg-white">
            <header class="font-bold">{{$post->title}}</header>   
            <body>
                {{$post->content}}
            </body>
        </article>    
        @endforeach
    </div>
</div>
