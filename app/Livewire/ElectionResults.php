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

    public function mount($electionId)
    {
        // Find the election by its ID
        $election = Election::find($electionId);

        // Check if results have been published
        if ($election) {
            $this->isPublished = $election->results_published;

            // Only load results if the election results are published
            if ($this->isPublished) {
                // Fetch results from the ElectionResult model
                $this->results = ElectionResult::where('election_id', $electionId)->get();
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
        ]);
    }
}
