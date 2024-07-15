<?php

namespace App\Livewire;

use App\Jobs\NotifyAllVoters;
use App\Models\Idea;
use Livewire\Component;
use Illuminate\Http\Response;

class SetStatus extends Component
{
    public $idea;
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

        $this->idea->status_id = $this->status;
        $this->idea->save();

        if ($this->notifyAllVoters) {
            NotifyAllVoters::dispatch($this->idea);
        }

        $this->dispatch('statusWasUpdated');
    }

    

    public function render()
    {
        return view('livewire.set-status');
    }
}
