<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    public $fillable = [
        'first_name', 'last_name', 'date_of_birth', 'first_parent_id', 'second_parent_id'
    ];
    public $table = 'children';

    public function first_parent()
    {
        if($this->first_parent_id)
        {
            return Member::find($this->first_parent_id);
        }
    }

    public function second_parent()
    {
        if($this->second_parent_id)
        {
            return Member::find($this->second_parent_id);
        }
    }
}
