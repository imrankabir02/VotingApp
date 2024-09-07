<?php

namespace App\Livewire;

use Livewire\Component;

class ElectionResult extends Component
{
    public $electionId;
    public $results;

    public function mount($electionId)
    {
        $this->electionId = $electionId;
        $this->results = ElectionResult::where('election_id', $electionId)->get();
    }

    public function render()
    {
        return view('livewire.election-result');
    }
}
