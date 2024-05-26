<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';
    
    use HasFactory;
    protected $fillable = [
        'quiz_desc',
    ];
    
    
    public function bab()
    {
        return $this->belongsTo(Bab::class);
    }

    public function Questions(){
        return $this->hasMany(Questions::class);
    }
}
