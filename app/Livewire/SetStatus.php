<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use App\Jobs\NotifyAllVoters;
use Illuminate\Http\Response;

class SetStatus extends Component
{
    public $idea;
    public $comment;
    public $status;
    public $notifyAllVoters;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {
        
        if (! auth()->check() && ! auth()->user()->id === $this->idea->user->id) {
            abort(Response::HTTP_FORBIDDEN);
        }

        if ($this->idea->status_id === (int) $this->status) {
            $this->dispatch('statusWasUpdatedError');
            return;
        }

        $this->idea->status_id = $this->status;
        $this->idea->save();

        if ($this->notifyAllVoters) {
            NotifyAllVoters::dispatch($this->idea);
        }

        Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => $this->status,
            'body' => $this->comment ? $this->comment : 'No comment was added.',
            'is_status_update' => true
        ]); 

        $this->reset('comment');

        $this->dispatch('statusWasUpdated');
    }

    

    public function render()
    {
        return view('livewire.set-status');
    }
}
