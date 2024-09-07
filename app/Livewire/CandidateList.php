<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Component;

class CandidateList extends Component
{
    public $electionId; // Election ID passed to the component
    public $candidates;

    // This method is called when the component is mounted
    public function mount($electionId)
    {
        $this->electionId = $electionId;
        $this->candidates = Candidate::where('election_id', $electionId)->get();
    }
    public function render()
    {
        return view('livewire.candidate-list');
    }
}
