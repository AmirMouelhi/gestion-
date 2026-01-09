<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    protected $fillable=[
        'cpVilles',
        'designationVilles',
    ];
    public function Etudiant(){
        return $this->hasMany(Etudiant::class);
    }
}
