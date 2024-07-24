<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ObservationDocenteSpanish',
        'ObservationDocenteMath',
        'ObservationDocenteEnglish',
        'ObservationPsicoorientador',
        'ObservationAcademico',
        'ObservationConvivencia',
        'ObservationRector',
        'signature_image_spanish_decimo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
