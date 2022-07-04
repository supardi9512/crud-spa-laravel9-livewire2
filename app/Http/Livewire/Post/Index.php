<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function destroy($postId)
    {
        $post = Post::find($postId);

        if($post) {
            $post->delete();
        }

        session()->flash('message', 'Data berhasil dihapus!');

        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')
                ->orWhere('content', 'like', '%'.$this->search.'%')
                ->latest()->paginate(5)
        ])->extends('layouts.app')->section('content');
    }
}
