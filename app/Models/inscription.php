<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions';

    protected $fillable = [
        'nce',
        'codeSp',
        'dateInscription',
        'niveauInscription',
        'resultatFinale',
        'mention',
    ];

    protected $casts = [
        'dateInscription' => 'date',
        'resultatFinale' => 'decimal:2',
    ];

    // Relationships
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'nce', 'nce');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'codeSp', 'codeSp');
    }

    // Scopes
    public function scopeByLevel(Builder $query, $niveau)
    {
        return $query->where('niveauInscription', $niveau);
    }

    public function scopeByYear(Builder $query, $year)
    {
        return $query->whereYear('dateInscription', $year);
    }

    public function scopePassed(Builder $query)
    {
        return $query->where('resultatFinale', '>=', 10);
    }
}
