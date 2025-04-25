<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'breed',
        'gender',
        'age',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likesSent()
    {
        return $this->hasMany(Like::class, 'dog_one_id');
    }

    public function likesReceived()
    {
        return $this->hasMany(Like::class, 'dog_two_id');
    }

    public function matchesAsFirstDog()
    {
        return $this->hasMany(DogMatch::class, 'dog_one_id');
    }

    public function matchesAsSecondDog()
    {
        return $this->hasMany(DogMatch::class, 'dog_two_id');
    }

    public function allMatches()
    {
        return $this->matchesAsFirstDog()->get()->merge($this->matchesAsSecondDog()->get());
    }
}
