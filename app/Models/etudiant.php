<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';
    protected $primaryKey = 'nce';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nce',
        'nci',
        'nom',
        'prenom',
        'datenaissance',
        'cpLieuNaissance',
        'adresse',
        'cpadresse',
    ];

    protected $casts = [
        'datenaissance' => 'date',
    ];

    // Relationships
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'cpadresse', 'cpVilles');
    }

    public function lieuNaissance()
    {
        return $this->belongsTo(Ville::class, 'cpLieuNaissance', 'cpVilles');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'nce', 'nce');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'nce', 'nce');
    }

    // Scopes
    public function scopeSearch(Builder $query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('nom', 'like', "%{$search}%")
              ->orWhere('prenom', 'like', "%{$search}%")
              ->orWhere('nce', 'like', "%{$search}%")
              ->orWhere('nci', 'like', "%{$search}%");
        });
    }

    public function scopeOrderByName(Builder $query, $direction = 'asc')
    {
        return $query->orderBy('nom', $direction)
                     ->orderBy('prenom', $direction);
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }

    public function getAgeAttribute()
    {
        if (!$this->datenaissance) {
            return null;
        }
        return \Carbon\Carbon::parse($this->datenaissance)->age;
    }
}
