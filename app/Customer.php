<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone_id'
    ];
    

    public function getPhone(){
        return $this->belongsTo(Phone::class,'phone_id');
    }
}
