<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishOctavo extends Model
{
    use HasFactory;
    protected $fillable = [
        'spanishPO1',
        'spanishPO2',
        'spanishPO3',
        'spanishPO4',
        'spanishPO5',
        'spanishPO6',
        'spanishPO7',
        'spanishPO8',
        'spanishPO9',
        'spanishPO10',
        'commentPO1',
        'commentPO2',
        'commentPO3',
        'commentPO4',
        'commentPO5',
        'commentPO8',
        'ObservationspanishPO',
        'ObservationspanishPO2',
        'ObservationspanishPO3',
        'ObservationspanishPO4',
        'averageSpanishPO',
        'attemptsSpanishPO',
        'correctSpanishPO',
        'incorrectSpanishPO',
        'regularSpanishPO'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
