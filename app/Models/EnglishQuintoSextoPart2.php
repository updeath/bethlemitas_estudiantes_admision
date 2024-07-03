<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishQuintoSextoPart2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'english2QSX1',
        'english2QSX2',
        'english2QSX3',
        'english2QSX4',
        'english2QSX5',
        'commentQSX1',
        'commentQSX2',
        'commentQSX3',
        'commentQSX4',
        'commentQSX5',
        //part2
        'english2part2QSX1',
        'english2part2QSX2',
        'english2part2QSX3',
        //part3
        'english2part3QSX1',
        'english2part3QSX2',
        'english2part3QSX3',
        'commentpart3QSX1',
        'commentpart3QSX2',
        'commentpart3QSX3',
        //part4
        'english2part4QSX1',
        'english2part4QSX2',
        'english2part4QSX3',
        'english2part4QSX4',
        'english2part4QSX5',
        'english2part4QSX6',
        'commentpart4QSX1',
        'commentpart4QSX2',
        'commentpart4QSX3',
        'commentpart4QSX4',
        'commentpart4QSX5',
        'commentpart4QSX6',
        //part5
        'english2part5QSX1',
        'english2part5QSX2',
        'english2part5QSX3',
        'english2part5QSX4',

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
