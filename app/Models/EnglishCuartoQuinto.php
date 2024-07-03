<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishCuartoQuinto extends Model
{
    use HasFactory;
    protected $fillable = [
        //part1
        'EnglishCQ1',
        'EnglishCQ2',
        'EnglishCQ3',
        'EnglishCQ4',
        //part2
        'EnglishCQpart2P1',
        'EnglishCQpart2P2',
        'EnglishCQpart2P3',
        'EnglishCQpart2P4',
        //part3
        'EnglishCQpart3P1',
        'EnglishCQpart3P2',
        'EnglishCQpart3P3',
        'EnglishCQpart3P4',
        'EnglishCQpart3P5',
        //part4
        'EnglishCQpart4P1',
        'EnglishCQpart4P2',
        'EnglishCQpart4P3',
        'commentEnglishhpart4P1',
        'commentEnglishhpart4P2',
        'commentEnglishhpart4P3',
        // part5
        'EnglishCQpart5P1',
        'EnglishCQpart5P2',
        'EnglishCQpart5P3',
        'EnglishCQpart5P4',
        'EnglishCQpart5P5',
        'EnglishCQpart5P6',
        'EnglishCQpart5P7',
        'EnglishCQpart5P8',
        'EnglishCQpart5P9',
        'commentEnglishpart5P1',
        'commentEnglishpart5P2',
        'commentEnglishpart5P3',
        'commentEnglishpart5P4',
        'commentEnglishpart5P5',
        'commentEnglishpart5P6',
        'commentEnglishpart5P7',
        'commentEnglishpart5P8',
        'commentEnglishpart5P9',
        //part6
        'EnglishCQpart6P1',
        'EnglishCQpart6P2',
        'EnglishCQpart6P3',
        'EnglishCQpart6P4',
        
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
