<?php

//Comando para crear este componente: 
//php artisan make:livewire Formulario

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Formulario extends Component
{

    public $categories, $tags;

    public PostCreateForm $postCreate;
    
    public PostEditForm $postEdit;
    
    public $posts;


    public function mount(){
        $this->categories = Category::all();
        $this->tags = Tag::all();

        $this->posts = Post::all();
    }

    public function save() {
        $this->postCreate->save();
        //Despues de crear el registro, actualizo la propiedad posts, 
        //para que se visualice en la vista
        $this->posts = Post::all();
        //Emitimos un evento y le pasamos un valor por el parametro
        $this->dispatch('action', 'Nuevo post creado');
    }

    public function edit($postId) {
        $this->resetValidation(); //resetea los errores de validacion
        $this->postEdit->edit($postId);
    }

    public function update() {
        $this->postEdit->update();
        $this->posts = Post::all();
        $this->dispatch('action', 'Post actualizado');
    }

    public function destroy($postId) {
        $post = Post::find($postId);
        $post->delete();
        $this->posts = Post::all();
        $this->dispatch('action', 'Post eliminado');
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
