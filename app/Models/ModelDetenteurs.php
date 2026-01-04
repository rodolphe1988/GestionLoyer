<?php

namespace App\Models;

#use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDetenteurs extends Model
{
    use HasFactory;

    protected $table='table_detenteurs';
    protected $primaryKey ='id';

    protected $fillable=['libelledetenteurs','etat'];
}
