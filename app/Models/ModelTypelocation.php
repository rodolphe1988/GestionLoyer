<?php

namespace App\Models;

#use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTypelocation extends Model
{
    use HasFactory;

    protected $table='table_typelocation';
    protected $primaryKey ='id';

    protected $fillable=['libelletypelocation','etat'];
}
