<?php

namespace App\Livewire\Admin;

use App\Models\Election;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ElectionManage extends Component
{

    public $elections, $title, $start_date, $end_date, $is_published, $electionId;
    public $updateMode = false;

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $this->elections = Election::all();
        return view('livewire.admin.election-manage');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->is_published = false;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Election::create([
            'title' => $this->title,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_published' => $this->is_published,
        ]);

        session()->flash('message', 'Election Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $election = Election::findOrFail($id);
        $this->electionId = $id;
        $this->title = $election->title;
        $this->start_date = $election->start_date;
        $this->end_date = $election->end_date;
        $this->is_published = $election->is_published;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $election = Election::find($this->electionId);
        $election->update([
            'title' => $this->title,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_published' => $this->is_published,
        ]);

        $this->updateMode = false;
        session()->flash('message', 'Election Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Election::find($id)->delete();
        session()->flash('message', 'Election Deleted Successfully.');
    }

    public function publishResults($id)
    {
        $election = Election::find($id);
        if ($election && now()->greaterThan($election->end_date)) {
            $election->results_published = true;
            $election->save();
            session()->flash('message', 'Results published successfully.');
        } else {
            session()->flash('error', 'Results cannot be published before the election ends.');
        }
    }


}




