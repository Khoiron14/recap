<?php

namespace App\Http\Livewire;

use App\Models\Recap;
use Livewire\Component;

class ShowRecap extends Component
{
    public Recap $recap;
    public $body, $showUpdateRecapForm = false;

    public function render()
    {
        return view('livewire.show-recap');
    }

    public function updateRecap()
    {
        $this->validate([
            'body' => 'required|string|max:5000'
        ]);

        $this->recap->body = $this->body;
        $this->recap->save();
        $this->showUpdateRecapForm = false;
        session()->flash('message', 'Recap edited');
    }

    public function showUpdateRecapForm()
    {
        $this->body = $this->recap->body;
        $this->showUpdateRecapForm = true;
    }

    public function closeUpdateRecapForm()
    {
        $this->showUpdateRecapForm = false;
    }

    public function deleteRecap()
    {
        $this->recap->delete();
        return redirect('/');
        session()->flash('message', 'Recap deleted');
    }
}
