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
     * usuwa auto razem ze wsztystkimi wpisami dotyczącymi danego auta
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($car) {
            $car->posts()->delete(); // Usuwa powiązane komentarze
        });
    }
    /**
     *  Relacje miedzy tabelami user - cars - car_posts
     * auto nalezy tylko do jendego użytkownika i moze miec wiele wpisów
     */
    public function user(){ return $this->belongsTo(User::class); }
    public function posts(){ return $this->hasMany(Post::class); }
}
