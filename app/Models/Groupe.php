<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Groupe extends Model

{
    use HasFactory;
    protected $table = 'groupe';
    protected $primaryKey = 'id_groupe';
    public $timestamps = false;

    protected $fillable = [
        'nom', 'logo', 'date_creation', 'description'
    ];

    public function acteurs()
    {
        return $this->belongsToMany(Acteur::class, 'membre_groupe', 'id_groupe', 'id_acteur')
                    ->withPivot('role');
    }
<<<<<<< HEAD
        public function activites()
    {
            return $this->hasMany(Activite::class,'id_groupe');
    }
=======
>>>>>>> cb156e4 (Premier commit)

}
