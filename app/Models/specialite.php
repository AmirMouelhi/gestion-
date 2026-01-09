<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class specialite extends Model
{
    protected $fillable=[
        'codeSp',
        'designationSp',
    ];
    public function Etudiant(){
        return $this->hasMany(Etudiant::class);
    }
}
