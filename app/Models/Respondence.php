<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondence extends Model
{
    protected $guarded = [];

    public function eksekusi(){
        return $this->belongsTo(Eksekusi::class,'id_respondence');
}

    protected $table = 'respondence';
    use HasFactory;
}
