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
        'bab_id',
        'matkul_code',
    ];
    
}
