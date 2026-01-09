<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;


class note extends Model
{
    protected $fillable=[
        'nce',
        'codeMat',
        'DateResultat',
        'noteControle',
        'noteExamen',
        'resultat',
    ];
    public function Etudiant(){
        return $this->hasMany(Etudiant::class,'nce');
    }

}
