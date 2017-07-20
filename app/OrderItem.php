<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'qty', 'meal_id', 'price'];

    /**
     * Orde model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->BelongsTo('App\Order');
    }

    /**
     * Orde model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function meal()
    {
        return $this->BelongsTo('App\Meal');
    }
}
