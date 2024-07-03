<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpanishDecimo extends Model
{
    use HasFactory;
    protected $fillable = [
        'spanishPD1',
        'spanishPD2',
        'spanishPD3',
        'spanishPD4',
        'spanishPD5',
        'spanishPD6',
        'spanishPD7',
        'spanishPD8',
        'spanishPD9',
        'spanishPD10',
        'comment_fragmentPD4_1',
        'comment_fragmentPD4_2',
        'comment_fragmentPD4_3',
        'comment_fragmentPD4_4',
        'commentPD5',
        'commentPD6',
        'commentPD7',
        'ObservationspanishPD',
        'ObservationspanishPD2',
        'ObservationspanishPD3',
        'ObservationspanishPD4',
        'averageSpanishPD',
        'attemptsSpanishPD',
        'correctSpanishPD',
        'incorrectSpanishPD',
        'regularSpanishPD'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
