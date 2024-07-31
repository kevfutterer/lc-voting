<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Http\Response;

class DeleteComment extends Component
{
    public Comment $comment;

    protected $listeners = ['setDeleteComment'];

    public function setDeleteComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);

        $this->dispatch('deleteCommentWasSet');

    }

    public function deleteComment()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->authorize('delete', $this->comment);

        Comment::destroy($this->comment->id);

        $this->comment = Comment::make();

        $this->dispatch('commentWasDeleted');
    }
    
    public function render()
    {
        return view('livewire.delete-comment');
    }
}
