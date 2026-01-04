<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTravaux extends Model
{
    use HasFactory;

    protected $table='travaux';
    protected $primaryKey ='id';
    protected $fillable=['idmaison','iddetenteur','numappart','intituletravaux','datenreg','montant','date'];
}
/*
 $table->integer('idmaison');
            $table->integer('numappart');
            $table->string('intituletravaux');
            $table->date('datenreg')->nullable();
            $table->integer('montant');
            $table->date('date')->nullable(); // */