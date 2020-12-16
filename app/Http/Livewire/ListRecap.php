<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Recap;
use Livewire\Component;

class ListRecap extends Component
{
    public $body, $monthFilter;

    protected $listeners = [
        'recap-created' => '$refresh'
    ];

    public function render()
    {
        list($year, $month) = strstr($this->monthFilter, '-') ? explode('-', $this->monthFilter) : array(null, null);
        $recaps = is_null($year) ? Recap::latest()->paginate(3) : Recap::whereYear('created_at', $year)->whereMonth('created_at', $month)->latest()->paginate(4);

        return view('livewire.list-recap', [
            'recaps' => $recaps
        ]);
    }

    public function filterReset()
    {
        $this->monthFilter = null;
    }

    public function showRecap($recapId)
    {
        return redirect()->route("recap.show", $recapId);
    }
}
