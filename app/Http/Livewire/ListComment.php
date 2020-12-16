<?php

namespace App\Http\Livewire;

use App\Models\Recap;
use App\Models\Comment;
use Livewire\Component;

class ListComment extends Component
{
    public $text, $updateStateId = 0, $recapId;

    public function mount($recap)
    {
        $this->recapId = $recap->id;
    }

    protected $listeners = [
        'comment-created' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.list-comment', [
            'comments' => Recap::find($this->recapId)->comments()->latest()->paginate(4)
        ]);
    }

    public function updateStateId($id)
    {
        $this->updateStateId = $id;
    }

    public function showUpdateCommentForm($commentId)
    {
        $comment = Comment::find($commentId);
        $this->text = $comment->text;
        $this->updateStateId($commentId);
    }

    public function updateComment($commentId)
    {
        $this->validate([
            'text' => 'required|string|max:5000'
        ]);

        $comment = Comment::find($commentId);
        $comment->text = $this->text;
        $comment->save();
        $this->updateStateId(0);
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
    }
}
