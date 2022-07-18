<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{   
    public function getCustomer()
    {
        return $this->hasOne(Customer::class);
    }

  
}
    