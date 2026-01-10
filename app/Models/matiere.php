<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Matiere extends Model
{
    use HasFactory;

    protected $table = 'matieres';
    protected $primaryKey = 'codeMat';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codeMat',
        'designationMat',
        'codeSp',
        'coefficient',
        'niveau',
    ];

    protected $casts = [
        'coefficient' => 'integer',
    ];

    // Relationships
    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'codeSp', 'codeSp');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'codeMat', 'codeMat');
    }

    // Scopes
    public function scopeByLevel(Builder $query, $niveau)
    {
        return $query->where('niveau', $niveau);
    }

    public function scopeBySpeciality(Builder $query, $codeSp)
    {
        return $query->where('codeSp', $codeSp);
    }
}
