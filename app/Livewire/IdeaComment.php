<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component
{
    public $comment;
    public $ideaUserId;

    protected $listeners = ['commentWasUpdated', 'commentWasMarkedAsSpam', 'commentWasNotAsSpam'];

    public function commentWasNotAsSpam()
    {
        $this->comment->refresh();
    }

    public function commentWasMarkedAsSpam()
    {
        $this->comment->refresh();
    }

    public function commentWasUpdated()
    {
        $this->comment->refresh();
    }

    public function mount(Comment $comment, $ideaUserId)
    {
        $this->comment = $comment;
        $this->ideaUserId = $ideaUserId;
    }

    public function render()
    {
        return view('livewire.idea-comment');
    }
}
