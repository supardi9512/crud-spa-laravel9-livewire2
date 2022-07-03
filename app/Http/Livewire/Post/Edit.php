<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class Edit extends Component
{
    public $postId;
    public $title;
    public $content;

    protected function rules()
    {
        return [
            'title' => 'required|unique:posts,title,' . $this->postId,
            'content' => 'required',
        ];
    }

    protected $messages = [
        'title.required' => 'Judul harus diisi!',
        'title.unique' => 'Judul tidak boleh sama!',
        'content.required' => 'Konten harus diisi!',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $post = Post::find($id);
        
        if($post) {
            $this->postId   = $post->id;
            $this->title    = $post->title;
            $this->content  = $post->content;
        }
    }

    public function submit()
    {
        $validatedData = $this->validate();

        if($this->postId) {
            $post = Post::find($this->postId);

            if($post) {
                $post->update($validatedData);
            }
        }

        session()->flash('message', 'Data berhasil diubah!');

        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.edit')
            ->extends('layouts.app')->section('content');
    }
}
