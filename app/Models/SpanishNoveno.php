<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishNoveno extends Model
{
    use HasFactory;

    protected $fillable = [
        'spanishPNO1',
        'spanishPNO2',
        'spanishPNO3',
        'spanishPNO4',
        'spanishPNO5',
        'spanishPNO6',
        'spanishPNO7',
        'spanishPNO8',
        'spanishPNO9',
        'spanishPNO10',
        'ObservationspanishPNO',
        'ObservationspanishPNO2',
        'ObservationspanishPNO3',
        'ObservationspanishPNO4',
        'averageSpanishPNO',
        'attemptsSpanishPNO',
        'correctSpanishPNO',
        'incorrectSpanishPNO',
        'regularSpanishPNO'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
