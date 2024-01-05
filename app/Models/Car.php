<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'car_year',
        'engine',
        'mileage'
    ];

    /**
     *  Relacje miedzy tabelami user - cars - car_posts
     * auto nalezy tylko do jendego użytkownika i moze miec wiele wpisów
     */
    public function user(){ return $this->belongsTo(User::class); }
    public function posts(){ return $this->hasMany(Post::class); }
}
