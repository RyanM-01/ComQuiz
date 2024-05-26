<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'matkul';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'photo', 'semester'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'photo' => 'string', 
    ];

    /**
     * Get the photo attribute as a base64 encoded string.
     *
     * @return string|null
     */
    public function getPhotoAttribute($value)
    {
        return $value ? base64_encode($value) : null;
    }

    /**
     * Scope a query to only include subjects with a certain code.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $code
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    /**
     * Scope a query to only include subjects with a certain name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByName($query, $name)
    {
        return $query->where('name', $name);
    }
    public function Subjects()
    {
        return $this->hasMany(Bab::class);
    }
}
