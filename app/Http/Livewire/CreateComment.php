<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateComment extends Component
{
    public $text, $recapId;

    // protected $listeners = [
    //     'comment-created' => '$refresh'
    // ];

    public function mount($recap)
    {
        $this->recapId = $recap->id;
    }

    public function render()
    {
        return view('livewire.create-comment');
    }

    public function createComment($recapId)
    {
        $this->validate([
            'text' => 'required|string|max:5000'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'recap_id' => $recapId,
            'text' => $this->text
        ]);

        $this->text = "";
        // $this->emit('comment-created');
        return redirect()->route('recap.show',[$recapId]);
        // session()->flash('message', 'Comment created');
    }
}
