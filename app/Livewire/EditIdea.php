<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class EditIdea extends Component
{
    public $idea;
    public $title;
    public $category;
    public $description;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category_id;
        $this->description = $idea->description;
    }

    public function render()
    {
        return view('livewire.edit-idea', [
            'categories' => Category::all(),
        ]);
    }

    public function updateIdea()
    {
        $this->validate();

        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->authorize('update', $this->idea);

        $this->idea->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description,
        ]);

        $this->dispatch('ideaWasUpdated');
    }
}
