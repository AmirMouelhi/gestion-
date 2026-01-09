<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class inscription extends Model // Model name remains lowercase
{
    protected $fillable = [
        'nce',
        'codeSp',
        'dateInscription',
        'niveauInscription',
        'resultatFinale',
        'mention',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'nce', 'nce');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'codeSp', 'codeSp');
    }
}
