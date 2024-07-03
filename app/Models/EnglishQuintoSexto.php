<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishQuintoSexto extends Model
{
    use HasFactory;
    protected $fillable = [
        'english5_6P1',
        'english5_6P2',
        'english5_6P3',
        'english5_6P4',
        //part2
        'english5_6_part2_P1',
        'english5_6_part2_P2',
        'english5_6_part2_P3',
        'english5_6_part2_P4',
        //part3
        'english5_6_part3_P1',
        'english5_6_part3_P2',
        'english5_6_part3_P3',
        'english5_6_part3_P4',
        //part4
        'english5_6_part4_P1',
        'english5_6_part4_P2',
        'english5_6_part4_P3',
        'english5_6_part4_P4',
        //comments part4
        'comment5_6_part4_p1',
        'comment5_6_part4_p2',
        'comment5_6_part4_p3',
        'comment5_6_part4_p4',

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
