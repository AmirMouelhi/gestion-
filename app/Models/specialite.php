<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;

    protected $table = 'specialites';
    protected $primaryKey = 'codeSp';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codeSp',
        'designationSp',
    ];

    // Relationships
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'codeSp', 'codeSp');
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class, 'codeSp', 'codeSp');
    }

    // Helper Methods
    public function getStudentsCount()
    {
        return $this->inscriptions()->distinct('nce')->count();
    }
}
