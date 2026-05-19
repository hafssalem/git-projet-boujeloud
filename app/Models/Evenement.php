<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $table = 'evenement';
    // protected $primaryKey = 'id_evenement';
    public $timestamps = false;

    protected $fillable = [
        'date_debut', 'date_fin', 'frequence',
        'saison', 'statut', 'id_spectacle'
    ];

    public function spectacle()
    {
        return $this->belongsTo(Spectacle::class, 'id_spectacle');
    }

}
