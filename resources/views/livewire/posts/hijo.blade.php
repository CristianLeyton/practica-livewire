<div>
    {{-- Puedo acceder a metodos del componente padre con $parent --}}
<x-button wire:click="$parent.increment" class="mb-4">Incrementar</x-button>
</div>
