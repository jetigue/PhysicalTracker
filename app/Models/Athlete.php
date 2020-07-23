<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Athlete extends Model
{

    /**
     * @var string
     */
    protected $table = 'athletes';

    /**
     * @var string[]
     */
    protected $appends = ['age', 'class'];

    /**
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'sex', 'grad_year', 'dob'];

    /**
     * @return string
     */
    public function path()
    {
        return "/athletes/{$this->id}";
    }

    /**
     * @var string[]
     */
    protected $casts = ['dob' => 'date:Y-m-d'];


    /**
     * @return HasMany
     */
    public function physicals()
    {
        return $this->hasMany(Physical::class);
    }

    /**
     * @param $query
     * @return Builder
     */
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('last_name', 'like', '%'.$query.'%')
            ->orWhere('first_name', 'like', '%'.$query.'%');
    }

    /**
     * @param $value
     * @return string
     */
    public function getSexAttribute($value)
    {
        if ($value == "f") {
            return "Female";
        }
        return "Male";
    }

    /**
     * @return mixed
     */
    public function getAgeAttribute()
    {
        return $this->dob->diffInYears(Carbon::now());
    }

    public function getClassAttribute()
    {
        $m = Carbon::now()->month;
        $y = Carbon::now()->year;
        $gy = $this->grad_year;

        switch($m)
        {
            case $m >= 6:
                if ($gy - $y === 4)
                { return 'Freshman'; }

                elseif ($gy - $y === 3)
                { return 'Sophomore'; }

                elseif ($gy - $y === 2)
                { return 'Junior'; }

                elseif ($gy - $y === 1)
                { return 'Senior'; }

                elseif ($gy - $y === 0)
                { return 'alum'; }

                else { return ''; }
            case $m <= 5:
                if ($gy - $y === 3)
                { return 'Freshman'; }

                elseif ($gy - $y === 2)
                { return 'Sophomore'; }

                elseif ($gy - $y === 1)
                { return 'Junior'; }

                elseif ($gy - $y === 0)
                { return 'Senior'; }

                else { return 'alum'; }
        }

    }

}
