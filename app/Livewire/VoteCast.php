<?php

namespace App\Livewire;

use App\Models\Ballot;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VoteCast extends Component
{
    public $electionId;
    public $candidateId;
    public $candidates;

    public function mount()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Logic for rendering the election candidates
        $this->candidates = Candidate::where('election_id', $this->electionId)->get();
    }

    public function castVote()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to vote.');
            return redirect()->route('login');
        }

        // Proceed to cast the vote for authenticated user
        $user = Auth::user();

        // Check if the user has already voted in this election
        if (Ballot::where('voter_id', $user->id)->where('election_id', $this->electionId)->exists()) {
            session()->flash('error', 'You have already voted in this election.');
            return;
        }

        // Create the ballot and cast the vote
        $ballot = Ballot::create([
            'voter_id' => $user->id,
            'election_id' => $this->electionId,
            'submitted_at' => now(),
        ]);

        Vote::create([
            'ballot_id' => $ballot->id,
            'candidate_id' => $this->candidateId,
        ]);

        session()->flash('message', 'Your vote has been cast successfully.');
    }

    public function render()
    {
        $candidates = Candidate::where('election_id', $this->electionId)->get();

        return view('livewire.vote-cast', compact('candidates'));
    }
}
