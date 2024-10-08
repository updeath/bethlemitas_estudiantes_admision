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
        'signature_image_spanish_decimo',
        'signature_image_math_decimo',
        'signature_image_english_decimo',
        'signature_image_psicoorientador',
        'signature_image_coordinador_academico',
        'signature_image_coordinador_convivencia',
        'signature_image_rector'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
