<?php

namespace App\Http\Livewire;

use App\Models\Athlete;
use Livewire\Component;
use Livewire\WithPagination;

class AthletesTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $sortField = 'last_name';
    public $sortAsc = true;
    public $search = '';

    public function clear()
    {
        $this->search = '';
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.athletes-table', [
            'athletes' => Athlete::search($this->search)
                ->with('physicals')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
