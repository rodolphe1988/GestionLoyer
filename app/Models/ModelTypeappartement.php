<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTypeappartement extends Model
{
    use HasFactory;

    protected $table='table_typeappartement';
    protected $primaryKey ='id';
    protected $fillable=['libelletypeappartement','etat'];
}
