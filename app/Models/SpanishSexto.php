<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishSexto extends Model
{
    use HasFactory;
    protected $fillable = [
        'spanishPSX1',
        'spanishPSX2',
        'spanishPSX3',
        'spanishPSX4',
        'spanishPSX5',
        'spanishPSX6',
        'spanishPSX7',
        'spanishPSX8',
        'spanishPSX9',
        'spanishPSX10',
        'commentPSX1',
        'commentPSX2',
        'commentPSX3',
        'commentPSX4',
        'commentPSX5',
        'commentPSX6',
        'ObservationspanishPSX',
        'ObservationspanishPSX2',
        'ObservationspanishPSX3',
        'ObservationspanishPSX4',
        'averageSpanishPSX',
        'attemptsSpanishPSX',
        'correctSpanishPSX',
        'incorrectSpanishPSX',
        'regularSpanishPSX'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

