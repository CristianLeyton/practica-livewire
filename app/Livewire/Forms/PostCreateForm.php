<?php
//Comando para crear este archivo
//php artisan livewire:form PostCreateForm

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostCreateForm extends Form
{   
    #[Rule('required|min:3',as: 'nombre')]
    public $title; 

    #[Rule('required|min:3')]
    public $content;
    
    #[Rule('required|exists:categories,id', as:'categoria')]
    public $category_id = '';

    #[Rule('required', message: 'Seleccione al menos una etiqueta.')]
    public $selectedTags = [];


    /*[
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
        'selectedTags' => 'required|array'
    ], [/* En este array puedo cambiar el mensaje que aparece al validar */
    /*     'selectedTags.required' => 'Seleccione al menos una etiqueta.'
    ], [/* En este array puedo cambiar los nombres de los campos a validar al momento del error */
        /* 'title' => 'nombre',
        'category_id' => 'categoria'
    ] */ 

    public function save() {
        $this->validate();//Ejecuto las validaciones
        $post = Post::create( //Creo el post
            $this->only('category_id', 'title', 'content')
        );
        $post->tags()->attach($this->selectedTags);//Enlazo las etiquetas
        //Resetea todas las propiedades
        $this->reset();
        // Resetea las propiedades indicadas
        //$this->reset(['category_id', 'title', 'content', 'selectedTags']);
        
    }

    
}
