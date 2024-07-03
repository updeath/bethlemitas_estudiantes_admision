<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class English9_10_11Part2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'english2NDO1',
        'english2NDO2',
        'english2NDO3',
        'english2NDO4',
        'english2NDO5',
        'english2NDO6',
        'english2NDO7',
        'english2NDO8',
        'english2NDO9',
        'english2NDO10',
        'english2NDO11',
        'english2NDO12',
        'english2NDO13',
        'english2NDO14',
        'english2NDO15',
        'average', 
        'attempts', 
        'correct',
        'incorrect'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
