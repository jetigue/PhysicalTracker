<?php

namespace App\Http\Livewire;

use App\Models\Athlete;
use App\Models\Physical;
use Illuminate\View\View;
use Livewire\Component;

class PhysicalsForm extends Component {

    public $athlete_id;
    public $exam_date;
    public $consent_form;
    public $concussion_form;
    public $evaluation_form;
    public $cardiac_form;
    public $restrictions;
    public $notes;

    public function submit()
    {
        $this->validate([
            'athlete_id'      => 'required|integer',
            'exam_date'       => 'required|date_format:Y-m-d',
            'consent_form'    => 'boolean',
            'concussion_form' => 'boolean',
            'evaluation_form' => 'boolean',
            'cardiac_form'    => 'boolean',
            'restrictions'    => 'string|nullable',
            'notes'           => 'string|nullable'
        ]);

        Physical::create([
            'athlete_id'      => $this->athlete_id,
            'exam_date'       => $this->exam_date,
            'consent_form'    => $this->consent_form,
            'concussion_form' => $this->concussion_form,
            'evaluation_form' => $this->evaluation_form,
            'cardiac_form'    => $this->cardiac_form,
            'restrictions'    => $this->restrictions,
            'notes'           => $this->notes,
        ]);

        $this->redirect('/physicals');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        $athletes = Athlete::query()->orderBy('last_name')->orderBy('first_name')->get();

        return view('livewire.physicals-form', compact('athletes'));
    }
}