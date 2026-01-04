<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCachet extends Model
{
    use HasFactory;

    protected $table = 'cachet_paiement_loyers';

    protected $fillable = [
        'chemin_cachet','etat'
    ];
}
