<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Physical extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'physicals';

    /**
     * @var string[]
     */
    protected $casts = ['exam_date' => 'date:Y-m-d'];

    /**
     * Fillable fields for an athlete.
     *
     *@var array
     */
    protected $fillable = [
        'athlete_id',
        'consent_form',
        'concussion_form',
        'evaluation_form',
        'cardiac_form',
        'exam_date',
        'restrictions',
        'notes',
        'form_path'
    ];

    /**
     * @return string
     */
    public function path()
    {
        return "/physicals/{$this->id}";
    }

    /**
     * @return BelongsTo
     */
    public function athlete()
    {
        return $this->belongsTo(Athlete::class, 'athlete_id');
    }

    /**
     * @param $query
     * @return Builder
     */
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('exam_date', 'like', '%'.$query.'%')
            ->orWhere('athletes.last_name', 'like', '%'.$query.'%')
            ->orWhere('athletes.first_name', 'like', '%'.$query.'%');
    }
}
