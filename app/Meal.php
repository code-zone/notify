<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['name', 'price', 'details', 'image', 'category', 'available'];

    protected $casts = [
        'available' => 'boolean',
    ];

    /**
     * OrderItem model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany('App\OrderItem');
    }
}
