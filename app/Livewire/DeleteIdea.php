<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use Illuminate\Http\Response;

class DeleteIdea extends Component
{
    public $idea;

    public function deleteIdea()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->authorize('delete', $this->idea);

        Vote::where('idea_id', $this->idea->id)->delete();

        Idea::destroy($this->idea->id);

        return redirect()->route('idea.index');
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.delete-idea');
    }
}
