<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishSeptimoOctavoParte2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'english2SO1',
        'english2SO2',
        'english2SO3',
        'english2SO4',
        //part2
        'english2Part2SO1',
        'english2Part2SO2',
        'english2Part2SO3',
        'english2Part2SO4',
        //part3
        'english2Part3SO1',
        'english2Part3SO2',
        'english2Part3SO3',
        'english2Part3SO4',
        'commentPart3SO1',
        'commentPart3SO2',
        'commentPart3SO3',
        'commentPart3SO4',
        'english2Part3SO1Answer',
        'english2Part3SO2Answer',
        'english2Part3SO3Answer',
        'english2Part3SO4Answer',
        //part4
        'english2Part4SO1',
        'english2Part4SO2',
        'english2Part4SO3',
        'english2Part4SO4',
        'english2Part4SO5',
        'commentPart4SO1',
        'commentPart4SO2',
        'commentPart4SO3',
        'commentPart4SO4',
        'commentPart4SO5',

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
