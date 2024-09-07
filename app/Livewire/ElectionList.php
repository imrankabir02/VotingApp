<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Election;

class ElectionList extends Component
{
    public $elections;

    public function mount()
    {
        $this->elections = Election::all();
    }

    public function render()
    {
        return view('livewire.election-list');
    }
}
