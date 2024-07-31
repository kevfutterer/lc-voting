<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Http\Response;

class MarkCommentNotAsSpam extends Component
{
    public Comment $comment;

    protected $listeners = ['setNotAsSpamComment'];

    public function setNotAsSpamComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);

        $this->dispatch('notAsSpamCommentWasSet');

    }

    public function notAsSpamComment()
    {
        if (auth()->guest() || ! auth()->user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->comment->spam_reports = 0;
        $this->comment->save();

        $this->dispatch('commentWasNotAsSpam');
    }
    
    public function render()
    {
        return view('livewire.mark-comment-not-as-spam');
    }
}
