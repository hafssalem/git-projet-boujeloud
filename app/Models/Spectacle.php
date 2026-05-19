<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
     use HasFactory;
    protected $table = 'spectacle';
    protected $primaryKey = 'id_spectacle';
    public $timestamps = false;

    protected $fillable = [
        'titre', 'type', 'description', 'langue',
        'public_cible', 'duree', 'nb_representations',
        'equipements', 'caractere', 'classification'
    ];

    public function evenements()
    {
        return $this->hasMany(Evenement::class, 'id_spectacle');
    }

}
