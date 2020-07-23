<?php

namespace App\Http\Livewire;

use App\Models\Physical;
use Livewire\Component;
use Livewire\WithPagination;

class PhysicalsTable extends Component
{
    use withPagination;

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
        return view('livewire.physicals-table', [
            'physicals' => Physical::search($this->search)
                ->join('athletes', 'athletes.id', '=', 'physicals.athlete_id')
                ->select(
                    'physicals.exam_date as exam_date',
                    'athletes.last_name as last_name',
                    'athletes.first_name as first_name'
                )
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
