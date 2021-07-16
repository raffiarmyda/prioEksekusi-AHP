<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datek extends Model
{
    protected $guarded = [];
    public function order(){
        $this->belongsTo(Order::class, 'sidnim');
    }
    public function eksekusi(){
        $this->hasMany(Eksekusi::class, 'id_datek');
    }
    protected $table = 'datek';
    use HasFactory;
}
