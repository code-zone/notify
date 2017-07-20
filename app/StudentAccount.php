<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    protected $fillable = ['student_id', 'current_amount', 'active'];

    protected $casts = ['active' => 'boolean'];
    /**
     * Student model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function student()
    {
        return $this->BelongsTo('App\Student');
    }
}
