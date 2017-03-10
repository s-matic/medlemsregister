<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = ['member_id', 'year', 'paid', 'amount'];

    public function member() {

    }
}
