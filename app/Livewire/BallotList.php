<?php

namespace App\Livewire;

use App\Models\Ballot;
use Livewire\Component;

class BallotList extends Component
{
    public $electionId;
    public $ballots;

    public function mount($electionId)
    {
        $this->electionId = $electionId;
        $this->ballots = Ballot::where('election_id', $electionId)->get();
    }

    public function render()
    {
        return view('livewire.ballot-list');
    }
}
