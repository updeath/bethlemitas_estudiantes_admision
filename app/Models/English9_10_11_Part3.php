<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class English9_10_11_Part3 extends Model
{
    use HasFactory;
    protected $fillable = [
        'english3NDO1',
        'english3NDO2',
        'english3NDO3',
        'english3NDO4',
        'english3NDO5',
        'english3NDO6',
        'english3NDO7',
        'english3NDO8',
        'english3NDO9',
        'english3NDO10',
        'english3NDO11',
        'english3NDO12',
        'english3NDO13',
        'english3NDO14',
        'english3NDO15',
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
