<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishSeptimo extends Model
{
    use HasFactory;
    protected $fillable = [
        'spanishPS1',
        'spanishPS2',
        'spanishPS3',
        'spanishPS4',
        'spanishPS5',
        'spanishPS6',
        'spanishPS7',
        'spanishPS8',
        'spanishPS9',
        'spanishPS10',
        'commentPS1',
        'commentPS2',
        'commentPS3',
        'commentPS4',
        'commentPS5',
        'commentPS6',
        'commentPS7',
        'ObservationspanishPS',
        'ObservationspanishPS2',
        'ObservationspanishPS3',
        'ObservationspanishPS4',
        'averageSpanishPS',
        'attemptsSpanishPS',
        'correctSpanishPS',
        'incorrectSpanishPS',
        'regularSpanishPS'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
