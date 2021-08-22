<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datek extends Model
{
    protected $guarded = [];

    public function order(){
        return $this->belongsTo(Order::class,'sidnim');
    }

    protected $table='datek';
    use HasFactory;
}
