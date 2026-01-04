<?php

namespace App\Models;

#use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelConstruction extends Model
{
    use HasFactory;

    protected $table='table_construction';
    protected $primaryKey ='id';

    protected $fillable=['libelleconstruction','etat'];
}
