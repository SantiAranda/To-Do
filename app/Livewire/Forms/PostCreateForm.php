<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostCreateForm extends Form
{
    #[Validate('required|exists:categories,id')]
    public $category_id = '';

    #[Validate('required|min:3|max:100')]
    public $title;

    #[Validate('required|min:3')]
    public $content;

    #[Validate('required|array')]
    public $tags = [];

    public function save()
    {
        $this->validate();

        $post = Post::create(
            $this->only('category_id', 'title', 'content')
        );

        $post->tags()->attach($this->tags);

        $this->reset();
    }
}
