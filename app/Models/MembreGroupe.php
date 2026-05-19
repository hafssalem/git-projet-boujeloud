<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembreGroupe extends Model
{
  
    protected $table = 'membre_groupe';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['id_acteur', 'id_groupe', 'role'];
}

