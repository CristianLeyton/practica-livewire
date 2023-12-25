<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostEditForm extends Form
{

    public $open = false;

    public $postEditId = '';

    #[Rule('required')]
    public $title; 

    #[Rule('required')]
    public $content;
    
    #[Rule('required|exists:categories,id')]
    public $category_id = '';

    #[Rule('required', message: 'Seleccione al menos una etiqueta.')]
    public $tags = [];

    public function edit($postId) {
        $this->postEditId = $postId;
        $this->open = true;
        $post = Post::find($postId);
        $this->category_id = $post->category_id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->tags = $post->tags->pluck('id')->toArray();
    }

    public function update() {
        $this->validate();
        $post = Post::find($this->postEditId);
        $post->update(
            $this->only('category_id', 'title', 'content')
        );
        //Otra forma: 
            /* $post->update([
                'category_id' => $this->postEdit['category_id'],
                'title' => $this->postEdit['title'],
                'content' => $this->postEdit['content']
             ]); */
        $post->tags()->sync($this->tags);
        $this->reset();

    }
}
