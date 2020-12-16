<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Recap;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateRecap extends Component
{
    public $body;

    protected $listeners = [
        'recap-deleted' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.create-recap');
    }

    public function createRecap()
    {
        $this->validate([
            'body' => 'required|string|max:5000'
        ]);

        Recap::create([
            'user_id' => Auth::id(),
            'body' => $this->body
        ]);

        $this->emit('recap-created');
        session()->flash('message', 'Recap created');
    }
}
