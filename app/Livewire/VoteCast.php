<?php

namespace App\Livewire;

use App\Models\Vote;
use App\Models\Ballot;
use Livewire\Component;
use App\Models\Candidate;

class VoteCast extends Component
{
    public $electionId;
    public $candidateId;
    public $voterId; // This would usually come from the authenticated user.

    public function castVote()
    {
        // Create a ballot entry
        $ballot = Ballot::create([
            'voter_id' => $this->voterId,  // This would be the logged-in user
            'election_id' => $this->electionId,
            'submitted_at' => now(),
        ]);

        // Cast vote
        Vote::create([
            'ballot_id' => $ballot->id,
            'candidate_id' => $this->candidateId,
        ]);

        session()->flash('message', 'Vote successfully cast.');
    }

    public function render()
    {
        $candidates = Candidate::where('election_id', $this->electionId)->get();

        return view('livewire.vote-cast', compact('candidates'));
    }
}
