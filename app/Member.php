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
        'first_name', 'last_name', 'date_of_birth', 'address', 'postal_code', 'city', 'telephone', 'email', 'number'
    ];
}
