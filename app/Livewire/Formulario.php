<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Formulario extends Component
{

    public $categories, $tags;

    public $category_id = '', $title, $content;

    public $selectedTags = [];

    public $posts;

    public function mount(){
        $this->categories = Category::all();
        $this->tags = Tag::all();

        $this->posts = Post::all();
    }

    public function save() {

        /* $post = Post::create([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'content' => $this->content,
        ]); */

        $post = Post::create(
            $this->only('category_id', 'title', 'content')
        );

        $post->tags()->attach($this->selectedTags);

        $this->reset(['category_id', 'title', 'content', 'selectedTags']);
        //Despues de crear el registro, actualizo la propiedad posts, 
        //para que se visualice en la vista
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
