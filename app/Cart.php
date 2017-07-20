<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['student_id', 'meal_id'];

    public $timestamps = false;

    /**
     * Student model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function student()
    {
        return $this->BelongsTo('App\Student');
    }

    /**
     * Meal model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function meal()
    {
        return $this->BelongsTo('App\Meal');
    }
}
