<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelLocataire;

class ModelAppartement extends Model
{
    use HasFactory;

    protected $table='table_appartement';
    protected $primaryKey ='id';
    protected $fillable=['idmaison','numappartement','typeappartement','typelocation','montantloyer','nbremoiscaution','montanttotalcaution','etatappartement','description','datedebut','datefin'];

     // 🔗 Relation avec les locataires
    public function locataires()
    {
        return $this->hasMany(ModelLocataire::class, 'numappartement', 'numappartement')
                    ->whereColumn('iddenomination', 'idmaison');
    }

}
