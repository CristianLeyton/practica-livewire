<div>
    <h1>{{$title}}</h1>
    <h2>User: {{$name}}</h2>
    <h2>Correo: {{$email}}</h2>
    <h1>Hola mundo desde el componente</h1>

    <div>
        {{-- El valor se actualiza automaticamente  --}}
    <x-input type="text" wire:model.live="name" {{-- value="{{$name}}" --}}/>

    <br>
    {{-- El valor se actualiza cuando se ejecuta un metodo en el componente, en este caso SAVE  --}}
    <x-input type="text" wire:model="email" {{-- value="{{$name}}" --}}/>
    <x-button wire:click="save">
        Save
    </x-button>
    </div>

 </div>