<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostEditForm extends Form
{
    #[Validate('required|exists:categories,id')]
    public $category_id = '';

    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $content;

    #[Validate('required|array')]
    public $tags = [];

    public $modal = false;
    public $postId = '';

    public function edit($postId)
    {
        $this->resetValidation();

        $this->modal = true;

        $this->postId = $postId;

        $post = Post::find($postId);

        $this->category_id = $post->category_id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->tags = $post->tags->pluck('id')->toArray();
    }

    public function update()
    {
        $this->validate();

        $post = Post::find($this->postId);

        $post->update(
            $this->only('category_id', 'title', 'content')
        );

        $post->tags()->sync($this->tags);

        $this->reset();
    }
}
