<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Member extends Model
{
    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return Hashids::encode($this->getKey());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'date_of_birth', 'address', 'postal_code', 'city', 'telephone', 'email', 'number', 'membership', 'interests'
    ];

    /*
     * Accessors
     */
    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function paidFee()
    {
        $fee = $this->fees()->where('year', date('Y'))->first();

        if(!isset($fee) || !$fee)
            return false;

        if($fee->paid)
            return true;

        return false;
    }

    public function hasInterest($name)
    {
        $key = array_search($name, unserialize($this->interests));
        if($key)
            return true;

        return false;
    }

    /*
     * Eloquent relationships
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function fees()
    {
        return $this->hasMany('App\Fee');
    }

}
