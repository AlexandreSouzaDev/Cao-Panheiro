<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_one_id',
        'dog_two_id',
    ];

    public function dogOne()
    {
        return $this->belongsTo(Dog::class, 'dog_one_id');
    }

    public function dogTwo()
    {
        return $this->belongsTo(Dog::class, 'dog_two_id');
    }
}
