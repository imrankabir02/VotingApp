<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Election;
use App\Models\ElectionResult;

class ElectionResults extends Component
{
    public $electionId;
    public $results;
    public $isPublished;
    public $winner;

    public function mount($electionId)
    {
        $election = Election::find($electionId);

        if ($election) {
            $this->isPublished = $election->results_published;

            if ($this->isPublished) {
                // Fetch results for all candidates
                $this->results = ElectionResult::where('election_id', $electionId)
                    ->orderBy('votes_count', 'desc')
                    ->get();

                // Determine the winner (candidate with the highest votes)
                $this->winner = $this->results->first(); // Candidate with the most votes
            } else {
                $this->results = null;
            }
        }
    }

    public function render()
    {
        return view('livewire.election-result', [
            'results' => $this->results,
            'isPublished' => $this->isPublished,
            'winner' => $this->winner,
        ]);
    }
}
