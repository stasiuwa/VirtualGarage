<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'mileage',
        'details',
        'price'
    ];

    /**
     * relacja z tabela Cars, jeden wpis moze nalezec tylko do jednego auta
     */
    public function car(){ return $this->belongsTo(Car::class); }
    public function user(){ return $this->belongsTo(User::class); }
}
