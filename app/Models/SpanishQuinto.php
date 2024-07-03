<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishQuinto extends Model
{
    use HasFactory;

    protected $fillable = [
        'spanishPQ1',
        'spanishPQ2',
        'spanishPQ3',
        'spanishPQ4',
        'spanishPQ5',
        'spanishPQ6',
        'spanishPQ7',
        'spanishPQ8',
        'spanishPQ9',
        'spanishPQ10',
        'commentPQ6',
        'commentPQ7',
        'commentPQ10',
        'ObservationspanishPQ',
        'ObservationspanishPQ2',
        'ObservationspanishPQ3',
        'ObservationspanishPQ4',
        'averageSpanishPQ',
        'attemptsSpanishPQ',
        'correctSpanishPQ',
        'incorrectSpanishPQ',
        'regularSpanishPQ'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
