<?php

namespace App\Http\Livewire;

use App\Models\Athlete;
use Livewire\Component;

class AthletesForm extends Component
{
    public $first_name;
    public $last_name;
    public $sex;
    public $grad_year;
    public $dob;

    public function submit()
    {
        $this->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'sex'        => 'required|in:m,f',
            'dob'        => 'required|date_format:Y-m-d',
            'grad_year'  => 'required|integer|min:2020'
        ]);

        Athlete::create([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'sex'        => $this->sex,
            'grad_year'  => $this->grad_year,
            'dob'        => $this->dob,
        ]);

        $this->redirect('/athletes');
    }

    public function render()
    {
        return view('livewire.athletes-form');
    }
}
