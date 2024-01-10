<div class="">
    <span class="font-bold"><p>Acciones realizadas:</p></span>
    <div class="p-3 bg-slate-100 rounded">
        @if (!count($comments))
            <p class="text-center">Ninguna acción realizada por el momento. </p>
        @endif
    <ul>
    @foreach ($comments as $comment)
    <li class="bg-white mb-1 p-2 border rounded" > {{$comment}} </li>    
    @endforeach
    </ul>   
    </div>
</div>

@push('js') {{-- Agrego un push al layout --}}

    <script> // Con esto escuho el evento de livewire "action" y ejecuto una funcion cuando suceda
        Livewire.on('action' , function(comment){
            console.log(comment[0]);
        });
    </script>
@endpush