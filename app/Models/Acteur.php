<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model

{
    use HasFactory;
    
    protected $table = 'acteur';
    protected $primaryKey = 'id_acteur';
    public $timestamps = false;

    protected $fillable = [
        'nom_prenom', 'date_naissance', 'cin_passport',
        'nationalite', 'adresse', 'telephone', 'email',
        'photo', 'date_inscription', 'statut'
    ];

    // Relations
    public function activites()
    {
        return $this->hasMany(Activite::class, 'id_acteur');
    }

    public function autorisations()
    {
        return $this->hasMany(Autorisation::class, 'id_acteur');
    }

    public function sanctions()
    {
        return $this->hasMany(Sanction::class, 'id_acteur');
    }

    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'membre_groupe', 'id_acteur', 'id_groupe')
                    ->withPivot('role');
    }

}
