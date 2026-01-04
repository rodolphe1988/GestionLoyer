<?php

namespace App\Models;

#use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMaison extends Model
{
    use HasFactory;

    protected $table='table_maison';
    protected $primaryKey ='id';
    protected $fillable=['denomination','detenteur','idtypeimmob','typeimmob','ville','commune','quartier','adresse','description','etat'];
}
