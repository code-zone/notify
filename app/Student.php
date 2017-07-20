<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use Notifiable;
    
    protected $fillable = ['name', 'email', 'user_id', 'phone_number', 'reg_no', 'course'];

    /**
     * User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * StudentAccount model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function account()
    {
        return $this->hasOne('App\StudentAccount');
    }


    /**
     * Cart model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cart()
    {
        return $this->hasMany('App\Cart');
    }
    /**
     * Payment model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Order model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
