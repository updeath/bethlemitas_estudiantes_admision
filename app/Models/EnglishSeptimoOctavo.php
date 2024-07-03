<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishSeptimoOctavo extends Model
{
    use HasFactory;
    protected $fillable = [
        'englishSO1',
        'englishSO2',
        'englishSO3',
        'englishSO4',
        'englishSO5',
        //part2
        'englishPart2SO1',
        'englishPart2SO2',
        'englishPart2SO3',
        //part3
        'englishPart3SO1',
        'englishPart3SO2',
        'englishPart3SO3',
        'englishPart3SO4',
        'englishPart3SO5',
        //part4
        'englishPart4SO1',
        'englishPart4SO2',
        'englishPart4SO3',

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
