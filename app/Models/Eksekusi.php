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
    public function order(){
        return $this->belongsTo(Order::class, 'id_sidnim');
    }
    public function respondence(){
        $this->hasMany(Respondence::class, 'id_respondence');
    }
    protected $table = 'eksekusi';
    use HasFactory;
}
