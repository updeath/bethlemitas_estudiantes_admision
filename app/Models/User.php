<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'number_documment',
        'typeDocumment',
        'birthdate',
        'iphone',
        'status',
        'degree',
        'asignature',
        'load_degrees',
        'test_date',
        'password',
    ];

    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function spanishCuarto()
    {
        return $this->hasOne(SpanishCuarto::class)->where('state', 'activo');
    }

    public function spanishQuinto()
    {
        return $this->hasOne(SpanishQuinto::class)->where('state', 'activo');
    }

    public function spanishSexto()
    {
        return $this->hasOne(SpanishSexto::class)->where('state', 'activo');
    }

    public function SpanishSeptimo()
    {
        return $this->hasOne(SpanishSeptimo::class)->where('state', 'activo');
    }
    public function SpanishOctavo()
    {
        return $this->hasOne(SpanishOctavo::class)->where('state', 'activo');
    }
    public function SpanishNoveno()
    {
        return $this->hasOne(SpanishNoveno::class)->where('state', 'activo');
    }

    public function SpanishDecimo()
    {
        return $this->hasOne(SpanishDecimo::class)->where('state', 'activo');
    }
    public function mathCuarto()
    {
        return $this->hasMany(MathCuarto::class, 'user_id');
    }
    public function mathQuinto()
    {
        return $this->hasMany(MathQuinto::class, 'user_id');
    }

    public function mathSexto()
    {
        return $this->hasMany(MathSexto::class, 'user_id');
    }
    public function mathSeptimo()
    {
        return $this->hasMany(MathSeptimo::class, 'user_id');
    }
    public function mathOctavo()
    {
        return $this->hasMany(MathOctavo::class, 'user_id');
    }
    public function mathNoveno()
    {
        return $this->hasMany(MathNoveno::class, 'user_id');
    }

    public function mathDecimo()
    {
        return $this->hasMany(MathDecimo::class, 'user_id');
    }

    public function EnglishCuartoQuinto()
    {
        return $this->hasOne(EnglishCuartoQuinto::class, 'user_id');
    }

    public function EnglishCuartoQuintoPart2()
    {
        return $this->hasOne(EnglishCQpart2::class, 'user_id');
    }

    public function EnglishQuintoSexto()
    {
        return $this->hasOne(EnglishQuintoSexto::class, 'user_id');
    }
    public function EnglishQuintoSextoPart2()
    {
        return $this->hasOne(EnglishQuintoSextoPart2::class, 'user_id');
    }

    public function EnglishSeptimoOctavo()
    {
        return $this->hasOne(EnglishSeptimoOctavo::class, 'user_id');
    }
    public function EnglishSeptimoOctavoPart2()
    {
        return $this->hasOne(EnglishSeptimoOctavoParte2::class, 'user_id');
    }

    public function EnglishNDO()
    {
        return $this->hasOne(English9_10_11::class, 'user_id');
    }

    public function EnglishNDOPart2()
    {
        return $this->hasOne(English9_10_11Part2::class, 'user_id');
    }

    public function EnglishNDOPart3()
    {
        return $this->hasOne(English9_10_11_Part3::class, 'user_id');
    }

    public function concept()
    {
        return $this->hasOne(Concept::class, 'user_id')->withDefault();
    }

    public function getObservations()
{
    return [
        'spanish' => $this->getObservation('ObservationDocenteSpanish'),
        'math' => $this->getObservation('ObservationDocenteMath'),
        'english' => $this->getObservation('ObservationDocenteEnglish'),
        'psicoorientador' => $this->getObservation('ObservationPsicoorientador'),
        'rector' => $this->getObservation('ObservationRector'),
        'academico' => $this->getObservation('ObservationAcademico'),
        'convivencia' => $this->getObservation('ObservationConvivencia'),
    ];
}

private function getObservation($field)
{
    $concept = $this->concept()->firstOrCreate(['user_id' => $this->id]);
    $observation = $concept->$field;

    return $observation !== 'Sin Observacion' ? explode(' - ', $observation) : null;
}
}
