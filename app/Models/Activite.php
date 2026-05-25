<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model

{
    use HasFactory;
    protected $table = 'activite';
    protected $primaryKey = 'id_activite';
    public $timestamps = false;

    protected $fillable = [
        'type_performance', 'mode_exercice', 'frequence',
        'lieu', 'langue', 'id_acteur'
    ];

    public function acteur()
    {
        return $this->belongsTo(Acteur::class, 'id_acteur');
    }
    public function groupe()
{
    return $this->belongsTo(Groupe::class,'id_groupe');
}

}
