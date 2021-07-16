<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eksekusi extends Model
{
    protected $guarded = [];
    public function datek(){
        $this->belongsTo(Datek::class, 'id_datek');
    }
    public function respondence(){
        $this->hasMany(Respondence::class, 'id_respondence');
    }
    protected $table = 'eksekusi';
    use HasFactory;
}
