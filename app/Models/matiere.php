<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class matiere extends Model
{
    protected $fillable=[
        'codeMat',
        'CodeSp',
        'DateInscription',
        'niveau',
        'resulatFnale',
        'Mention',

    ];
    public function Etudiant(){
        return $this->hasMany(Etudiant::class);
    }
    public function note(){
        return $this->hasMany(note::class,'codeMat','codeMat');
    }
}
