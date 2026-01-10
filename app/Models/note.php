<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $fillable = [
        'nce',
        'codeMat',
        'DateResultat',
        'noteControle',
        'noteExamen',
        'resultat',
    ];

    protected $casts = [
        'DateResultat' => 'date',
        'noteControle' => 'decimal:2',
        'noteExamen' => 'decimal:2',
        'resultat' => 'decimal:2',
    ];

    // Relationships
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'nce', 'nce');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'codeMat', 'codeMat');
    }

    // Scopes
    public function scopePassed(Builder $query)
    {
        return $query->where('resultat', '>=', 10);
    }

    public function scopeFailed(Builder $query)
    {
        return $query->where('resultat', '<', 10);
    }

    // Accessors
    public function getIsPassedAttribute()
    {
        return $this->resultat >= 10;
    }

    public function getMentionAttribute()
    {
        if ($this->resultat >= 16) return 'Très Bien';
        if ($this->resultat >= 14) return 'Bien';
        if ($this->resultat >= 12) return 'Assez Bien';
        if ($this->resultat >= 10) return 'Passable';
        return 'Échec';
    }
}
