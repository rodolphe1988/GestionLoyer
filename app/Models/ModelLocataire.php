<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelAppartement;

class ModelLocataire extends Model
{
    use HasFactory;

    protected $table='table_locataire';
    protected $primaryKey ='id';
    protected $fillable=['iddenomination','numappartement','nom','prenom','numero1','numero2','adresseemail','occupation','montantcaution','dateentree','datesortie','reliquatcaution'];


  // Relation vers l'appartement
   public function appartement()
{
    return $this->belongsTo(ModelAppartement::class, 'numappartement', 'numappartement')
                ->where('table_appartement.idmaison', $this->iddenomination);
}


}
