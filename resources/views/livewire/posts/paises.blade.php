<div>
    {{-- Componente dentro de otro --}}
    @livewire('posts.hijo')
    {{-- Setear variables desde la vista --}}
    <x-button class="mb-4" wire:click="$set('count', 0)">
        Resetear
    </x-button>

    <x-button class="mb-4" wire:click="$toggle('open')">
        Mostrar/Ocultar
    </x-button>

    {{-- Evento submit --}}
    <form class="mb-4" wire:submit="save">
    <x-input 
    placeholder="Ingrese un nuevo pais"
    {{-- Evento keydown --}}
    wire:keydown.space="increment"
    {{-- Enlazo el input con la variable pais --}}
    wire:model="pais"></x-input>
    <x-button >Agregar</x-button>
    </form>

    @if ($open)
    <ul class="list-disc list-inside space-y-2">
        @foreach ($paises as $index => $pais)
            <li {{-- Asigno una llave que identifique el elemento unico --}} wire:key="pais-{{$index}}">
                {{-- Evento mouseenter --}}
                <span wire:mouseenter="changeActive('{{$pais}}')">
                    ({{$index}}) {{$pais}}
                </span>
                {{-- Evento click --}}
                <x-danger-button wire:click="delete({{$index}})">
                    X
                </x-danger-button>
            </li>
        @endforeach
    </ul>
    @endif

    

    Mouse sobre pais: {{$active}}
    <br>
    Cantidad de espacios: {{$count}}
</div>
