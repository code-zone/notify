<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number', 'student_id', 'status', 'amount'];

    /**
     * OrderItem model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }
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
