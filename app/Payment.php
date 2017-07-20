<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['student_id', 'trn', 'amount', 'paid_via'];

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
