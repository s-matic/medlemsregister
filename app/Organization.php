<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
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
        'name', 'address', 'postal_code', 'city', 'email',
    ];

    public function members()
    {
        return $this->hasMany('App\Member');
    }
}
