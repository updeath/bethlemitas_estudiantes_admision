<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishCuarto extends Model
{
    use HasFactory;
    protected $fillable = [
        'spanishPC1',
        'spanishPC2',
        'spanishPC3',
        'spanishPC4',
        'spanishPC5',
        'spanishPC6',
        'spanishPC7',
        'spanishPC8',
        'spanishPC9',
        'spanishPC10',
        'commentPC8',
        'ObservationspanishPC',
        'ObservationspanishPC2',
        'ObservationspanishPC3',
        'ObservationspanishPC4',
        'averageSpanishPC',
        'attemptsSpanishPC',
        'correctSpanishPC',
        'incorrectSpanishPC',
        'regularSpanishPC'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
