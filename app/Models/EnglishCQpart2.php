<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishCQpart2 extends Model
{
    use HasFactory;
    protected $fillable = [
        //part1
        'englishQSX1',
        'englishQSX2',
        'englishQSX3',
        'englishQSX4',
        'englishQSX5',
        //part2
        'englishpart2QSX1',
        'englishpart2QSX2',
        'englishpart2QSX3',
        'englishpart2QSX4',
        'englishpart2QSX5',
        //part3
        'englishpart3QSX1',
        'englishpart3QSX2',
        'englishpart3QSX3',
        'englishpart3QSX4',
        'englishpart3QSX5',
        //part4
        'englishpart4QSX1',
        'englishpart4QSX2',
        'englishpart4QSX3',
        'englishpart4QSX4',
        'englishpart4QSX5',
        
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
