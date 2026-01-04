<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCommune extends Model
{
    use HasFactory;

    protected $table='table_commune';
    protected $primaryKey ='id';
    protected $fillable=['commune'];
}
