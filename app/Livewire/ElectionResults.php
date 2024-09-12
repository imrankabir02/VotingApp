<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ballot;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\ElectionResult;
use App\Models\Vote;

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
                // Generate results
                $this->generateResults($electionId);

                // Fetch results for all candidates
                $this->results = ElectionResult::where('election_id', $electionId)
                    ->orderBy('votes_count', 'desc')
                    ->get();

                // Ensure there are results before determining a winner
                if ($this->results->isNotEmpty()) {
                    // Determine the winner (candidate with the highest votes)
                    $this->winner = $this->results->first(); // Candidate with the most votes
                } else {
                    $this->winner = null;
                }
            } else {
                $this->results = null;
            }
        }
    }

    // Method to generate and store results
    public function generateResults($electionId)
    {
        // Get all candidates in the election
        $candidates = Candidate::where('election_id', $electionId)->get();

        foreach ($candidates as $candidate) {
            // Count the votes for each candidate
            $votesCount = Vote::where('candidate_id', $candidate->id)->count();

            // Create or update the election result for the candidate
            ElectionResult::updateOrCreate(
                ['election_id' => $electionId, 'candidate_id' => $candidate->id],
                ['votes_count' => $votesCount]
            );
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
