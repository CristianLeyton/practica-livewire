<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class Paises extends Component
{

    public $open = true;

    public $paises = [
        'Perú',
        'Colombia',
        'Argentina',
    ];

    public $pais;
    public $active;
    public $count = 0;

    public function save() {
        array_push($this->paises, $this->pais);
        /* $this->pais = ''; */
        //$this->reset('pais');
        //En caso de querer resetear varias propiedades es asi:
        $this->reset(['pais','count']);
    }

    public function delete($index) {
        unset($this->paises[$index]);
    }

    public function changeActive($pais) {
        $this->active = $pais;
    }

    public function increment() {
        $this->count++;
    }


    public function render()
    {
        return view('livewire.posts.paises');
    }
}
