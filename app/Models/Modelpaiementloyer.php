<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelModepaiement;

class Modelpaiementloyer extends Model
{
    use HasFactory;

    /*
     $table->integer('idmaison');
            $table->integer('numappart');
            $table->integer('idlocataire');
            $table->string('nomlocataire');
            $table->integer('nomlocataire','montantloyer',);
            $table->integer('nomlocataire','montantloyer','montantmensuelverse','montantloyer','moispaieloyer','relicatloyer','daterengloyer','moisenregloyer');
            $table->integer('montantloyer');
            $table->string('moispaieloyer');
            $table->integer('relicatloyer');
            $table->date('daterengloyer');
            $table->string('moisenregloyer');
    */

    protected $table='table_paiement_loyer';
    protected $primaryKey ='id';
    protected $fillable=['idmaison','numappart','idlocataire','nomlocataire','montantloyer','montantmensuelverse','modepaiement','moispaieloyer','relicatloyer','type_versement','daterengloyer','moisenregloyer','montantrelicatloyer','dateversementrelicatloyer','annule'];


public function modePaiementInfo()
{
    return $this->belongsTo(ModelModepaiement::class, 'modepaiement', 'id');
}





}

