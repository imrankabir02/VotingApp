<?php

namespace App\Livewire\Admin;

use App\Models\Candidate;
use App\Models\Election;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CandidateManage extends Component
{
    public $candidates, $name, $party, $description, $election_id;
    public $updateMode = false;
    public $candidateId;
    public $elections;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $this->candidates = Candidate::all();
        $this->elections = Election::all();
        return view('livewire.admin.candidate-manage');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->party = '';
        $this->description = '';
        $this->election_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'election_id' => 'required',
        ]);

        Candidate::create([
            'name' => $this->name,
            'party' => $this->party,
            'description' => $this->description,
            'election_id' => $this->election_id,
        ]);

        session()->flash('message', 'Candidate Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        $this->candidateId = $id;
        $this->name = $candidate->name;
        $this->party = $candidate->party;
        $this->description = $candidate->description;
        $this->election_id = $candidate->election_id;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'election_id' => 'required',
        ]);

        $candidate = Candidate::find($this->candidateId);
        $candidate->update([
            'name' => $this->name,
            'party' => $this->party,
            'description' => $this->description,
            'election_id' => $this->election_id,
        ]);

        $this->updateMode = false;
        session()->flash('message', 'Candidate Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Candidate::find($id)->delete();
        session()->flash('message', 'Candidate Deleted Successfully.');
    }
}
