<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = 'villes';
    protected $primaryKey = 'cpVilles';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cpVilles',
        'designationVilles',
    ];

    // Relationships
    public function etudiantsResidents()
    {
        return $this->hasMany(Etudiant::class, 'cpadresse', 'cpVilles');
    }

    public function etudiantsNes()
    {
        return $this->hasMany(Etudiant::class, 'cpLieuNaissance', 'cpVilles');
    }
}
