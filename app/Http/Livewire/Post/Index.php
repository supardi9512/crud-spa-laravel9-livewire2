<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.post.index');

        // Custom layouts
        // return view('livewire.post.index')->layout('app');
    }
}
