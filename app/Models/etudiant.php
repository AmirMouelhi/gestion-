<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
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

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'cpadresse', 'cpVilles');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'nceInscription', 'nce');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'nce', 'nce');
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }
}
