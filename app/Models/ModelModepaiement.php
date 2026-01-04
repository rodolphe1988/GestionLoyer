<?php

namespace App\Models;

#use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelModepaiement extends Model
{
    use HasFactory;

    protected $table='table_modepaiement';
    protected $primaryKey ='id';

    protected $fillable=['libellemodepaiement','etat'];
}
