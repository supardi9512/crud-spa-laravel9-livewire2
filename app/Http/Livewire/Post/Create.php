<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class Create extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|unique:posts,title',
        'content' => 'required',
    ];

    protected $messages = [
        'title.required' => 'Judul harus diisi!',
        'title.unique' => 'Judul tidak boleh sama!',
        'content.required' => 'Konten harus diisi!',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        Post::create($validatedData);

        session()->flash('message', 'Data berhasil disimpan!');

        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.create')
            ->extends('layouts.app')->section('content');
    }
}
