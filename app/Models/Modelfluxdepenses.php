<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelfluxdepenses extends Model
{
    use HasFactory;
    /*
     protected $table='table_locataire';
    protected $primaryKey ='id';
    protected $fillable=['iddenomination','numappartement','nom','prenom','numero1','numero2','adresseemail','occupation','montantcaution','dateentree','datesortie','reliquatcaution'];
    */

    protected $table="table_flux_sortants";
    protected $primaryKey='id';
    protected $fillable=['detenteurs','beneficiaire','montant','modepaiement','observation','dateereng'];
}
