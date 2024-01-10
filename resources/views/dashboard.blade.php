<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- @livewire('posts.create-post', [
                    'title' => 'Hola mundo pasado desde la vista',
                    'user' => 2,
                ]) --}}
                {{-- @livewire('posts.contador') --}}
                @livewire('formulario')
            </div>
        </div>
    </div>
    <div class="pb-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        @livewire('comments')
    </div>
    </div>
    </div>
</x-app-layout>
