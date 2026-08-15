<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    
    public function invType(){
        return $this->belongsTo('App\Models\InvestmentType', 'investment_type_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
