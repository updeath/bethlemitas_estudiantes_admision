<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathCuarto extends Model
{
    use HasFactory;


    protected $fillable = ['mathPC1', 'mathPC2', 'mathPC3', 'mathPC4', 'mathPC5', 'mathPC6', 'mathPC7',
    'mathPC8', 'mathPC9', 'mathPC10', 'ObservationmathPC', 'average', 'attempts', 'correct','incorrect' ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
