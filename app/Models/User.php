<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'gender',
        'score',
        'balance',
        'dailystrike',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function completeQuiz($scoreIncrement, $balanceIncrement)
    {
        $this->score = max(0, $this->score + $scoreIncrement);
        $this->balance = max(0, $this->balance + $balanceIncrement);
        $this->save();
    }
}
