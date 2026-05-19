<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model

{
     use HasFactory;
    protected $table = 'sanction';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'type', 'date', 'description', 'id_acteur'
    ];

    public function acteur()
    {
        return $this->belongsTo(Acteur::class, 'id_acteur');
    }
}

