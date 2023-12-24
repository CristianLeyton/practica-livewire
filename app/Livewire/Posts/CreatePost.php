<?php
//Comando para crear este componente: 

//php artisan make:livewire posts.CreatePost


namespace App\Livewire\Posts;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{

    //Tipo de datos que maneja livewire: 
    // Array, String, Integer, Float, Boolean, NULL
    // Colecciones, modelos, datetime, etc

    public $title;
    public $name, $email;

    public function mount(User $user){
        //Asignar valores uno por uno
        /* $this->name = $user->name;
        $this->email = $user->email; */
        
        ////Asignar muchos valores al mismo tiempo
        $this->fill(
            $user->only(['name','email'])
        );
    }


    public function save() {
        /* dd($this->name); */
    }

    public function render()
    {

        //COMPONENTE EN LINEA, SIN VISTA
        /* return <<<'HTML'
        <div>
        <h1>Hola mundo desde el componente</h1>
        </div>
        HTML; */

        return view('livewire.posts.create-post');
    }
}
