<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Formulario extends Component
{
    public $categories, $tags;
    public $posts;

    public PostCreateForm $postCreate;
    public PostEditForm $postEdit;

    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    public function updating($property, $value)
    {
        if ($property === 'postCreate.category_id') {
            if ($value > 3) {
                throw new \Exception("ERROR al seleccionar la categoria");
            }
        }
    }

    public function save()
    {
        $this->postCreate->save();
        $this->posts = Post::all();

        $this->dispatch('post-event', 'Nuevo articulo creado');
    }

    public function edit($postId)
    {
        $this->postEdit->edit($postId);
    }

    public function update()
    {
        $this->postEdit->update();
        $this->posts = Post::all();

        $this->dispatch('post-event', 'Articulo actualizado');
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        $this->posts = Post::all();

        $this->dispatch('post-event', 'Articulo eliminado');
    }

    public function render()
    {
        return view('livewire.formulario');
    }
}
