<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation extends Model
{
    use HasFactory;
    
    protected $table = 'autorisation';
    protected $primaryKey = 'id';
// public $incrementing = true;
// protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'date_debut', 'date_fin', 'statut', 'id_acteur'
    ];

    public function acteur()
    {
        return $this->belongsTo(Acteur::class, 'id_acteur');
    }
}

