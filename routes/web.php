<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Tableusercontroller;
use App\Http\Controllers\ControllerDetenteurs;
use App\Http\Controllers\DetenteursController;
use App\Http\Controllers\ControllerModepaiement;
use App\Http\Controllers\ControllerConstruction;
use App\Http\Controllers\ControllerTypelocation;
use App\Http\Controllers\ControllerMaison;
use App\Http\Controllers\TypeImmobilierController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\ControllerTypeappartement;
use App\Http\Controllers\AfficeherdonneesappartController;
use App\Http\Controllers\RecupererangappartController;
use App\Http\Controllers\ControllerAppartement;
use App\Http\Controllers\ControllerLocataire;
use App\Http\Controllers\AfficherdonneesdslocataireController;
use App\Http\Controllers\AffichernumappartController;
use App\Http\Controllers\AfficherinfostravauxController;
use App\Http\Controllers\DetailsAppartController;
use App\Http\Controllers\AfficherdonneesdstravauxController;
use App\Http\Controllers\AfficherlocataireController;
use App\Http\Controllers\AfficherdonneesdspaieloyerController;
use App\Http\Controllers\ControllerTravaux;
use App\Http\Controllers\afficherdonneesappartlocataireController;
use App\Http\Controllers\AffichernumappartlocatController;
use App\Http\Controllers\Controllerpaiementloyer;
use App\Http\Controllers\AfficherdonneesfluxsortantController;
use App\Http\Controllers\Controllerfluxsortants;
use App\Http\Controllers\AffichernomlocatController;
use App\Http\Controllers\AffichernumappartementController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\CachetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/accueil', function () {
    return view('index');
})->middleware('check.session')->name('index');*/



Route::get('/getnombrepardetenteurs', [AccueilController::class, 'totauxParDetenteursecond'])->middleware('check.session')->name('getnombrepardetenteurs');
Route::get('/progressionpardetenteur', [AccueilController::class, 'progressionParDetenteur'])->middleware('check.session')->name('progressionpardetenteur');
Route::get('/progressionpardetenteurameliore', [AccueilController::class, 'progressionParDetenteurAmeliore'])->middleware('check.session')->name('progressionpardetenteur');

Route::get('/gettotalloyerpardetenteurs', [AccueilController::class, 'totalLoyerParDetenteur'])->middleware('check.session')->name('gettotalloyerpardetenteurs');
//Route::get('/top10locatairesannuelpardetenteur', [AccueilController::class, 'top10LocatairesAnnuelParDetenteur'])->middleware('check.session')->name('top10locatairesannuelpardetenteur');
Route::get('/top10locatairesannuelpardetenteur', [AccueilController::class,'top10LocatairesAnnuelParDetenteurSecond'])->middleware('check.session')->name('top10locatairesannuelpardetenteur');
Route::get('/montantparmaisonmoiscourantpardetenteur', [AccueilController::class, 'montantParMaisonMoisCourantParDetenteurthird'])->middleware('check.session')->name('montantparmaisonmoiscourantpardetenteur');
Route::get('/montantparmaisonmoiscourantpardetenteurparam', [AccueilController::class, 'montantParMaisonMoisCourantParDetenteurfourth'])->middleware('check.session')->name('montantparmaisonmoiscourantpardetenteur');
Route::get('/top10locatairesannuel', [AccueilController::class, 'top10LocatairesAnnuelthird'])->middleware('check.session')->name('top10locatairesannuel');
Route::get('/montantparmaisonmoiscourant', [AccueilController::class, 'montantParMaisonMoisCourantSecond'])->middleware('check.session')->name('montantparmaisonmoiscourant');
Route::get('/accueil', [AccueilController::class, 'index'])->middleware('check.session')->name('index');

Route::get('/getfluxsortants_pardetenteurs',[AccueilController::class, 'totauxFluxSortantsParDetenteur'])->middleware('check.session')
 ->name('getfluxsortants_pardetenteurs');

Route::get('/liste-detenteurs', [AccueilController::class, 'listeDetenteurs']);


Route::get('/', function () {
    return Auth::check() ? redirect()->route('index') : view('login');
})->middleware('check.session')->name('authentification');



Route::get('/home', function () {
    return view('welcome');
})->middleware('check.session')->name('home');




Route::get('/forgotpage', function () {
    return view('welcome');
})->middleware('check.session')->name('forgottenpassword');


Route::get('entreprise/', function () {
    return view('entreprise');
})->middleware('check.session')->name('entreprise');


Route::get('detenteur/', function () {
    return view('detenteurs');
})->middleware('check.session')->name('detenteur');

Route::get('construction/', function () {
    return view('construction');
})->middleware('check.session')->name('construction');

Route::get('typelocation/', function () {
    return view('typelocation');
})->middleware('check.session')->name('typelocation');

Route::get('modepaiement/', function () {
    return view('modepaiement');
})->middleware('check.session')->name('modepaiement');

Route::get('autre/', function () {
    return view('autres');
})->middleware('check.session')->name('autre');


Route::get('locataire/', [AfficherdonneesdslocataireController::class, 'index'])->middleware('check.session')->name('locataire');

Route::get('travaux/', [AfficherdonneesdstravauxController::class, 'index'])->middleware('check.session')->name('travaux');

Route::get('paiementloyer/', [AfficherdonneesdspaieloyerController::class, 'index'])->middleware('check.session')->name('paiementloyer');

Route::get('fluxsortant/', [AfficherdonneesfluxsortantController::class, 'index'])->middleware('check.session')->name('fluxsortant');



Route::get('typeappartement/', function () {
    return view('typeappartement');
})->middleware('check.session')->name('typeappartement');

Route::get('appartement/',[AfficeherdonneesappartController::class, 'index'])->middleware('check.session')->name('appartement');


Route::get('patrimoine/',[TypeImmobilierController::class, 'index'])->middleware('check.session')->name('patrimoine');

Route::get('/getrang/{id}',[RecupererangappartController::class, 'getRang'])->middleware('check.session')->name('getrang');



Route::get('sites/', function () {
    return view('messites');
})->name('messites');

//Detenteurs
Route::get('/detenteurs',[ControllerDetenteurs::class, 'index'])->middleware('check.session')->name('afficherdetenteurs');
Route::post('/detenteuri',[ControllerDetenteurs::class, 'store'])->middleware('check.session')->name('insertiondetenteur');
Route::post('/suppdetenteur/{id}',[ControllerDetenteurs::class, 'destroy'] )->middleware('check.session')->name('suppdetenteur');
Route::get('/getdetenteurpar/{id}',[ControllerDetenteurs::class, 'getDetenteurById'] )->middleware('check.session')->name('getdetenteurpar');
Route::post('/updatedetenteur/{id}',[ControllerDetenteurs::class, 'update'] )->middleware('check.session')->name('updatedetenteur');
Route::post('/rollbackdetenteur/{id}',[ControllerDetenteurs::class, 'updateetat'] )->middleware('check.session')->name('rollbackdetenteur');
Route::get('/nmbredetenteurs',[ControllerDetenteurs::class, 'getNmbreDetenteurs'])->middleware('check.session')->name('affichernmbredetenteurs');

//Modepaiement

Route::get('/mesmodepaiements',[ControllerModepaiement::class, 'index'])->middleware('check.session')->name('affichermodepaiement');
Route::post('/modepaiementi',[ControllerModepaiement::class, 'store'])->middleware('check.session')->name('insertionmodepaiement');
Route::post('/updatemodepaiement/{id}',[ControllerModepaiement::class, 'update'] )->middleware('check.session')->name('updatemodepaiement');
Route::get('/getmodepaiementpar/{id}',[ControllerModepaiement::class, 'getModepaiementById'] )->middleware('check.session')->name('getmodepaiementpar');
Route::post('/suppmodepaiement/{id}',[ControllerModepaiement::class, 'destroy'] )->middleware('check.session')->name('suppmodepaiement');
Route::post('/rollbackmodepaiement/{id}',[ControllerModepaiement::class, 'updateetat'] )->middleware('check.session')->name('rollbackmodepaiement');

//Construction
Route::get('/typeconstruction',[ControllerConstruction::class, 'index'])->middleware('check.session')->name('affichertypeconstruction');
Route::post('/typeconstructioni',[ControllerConstruction::class, 'store'])->middleware('check.session')->name('insertiontypeconstruction');
Route::post('/updatetypeconstruction/{id}',[ControllerConstruction::class, 'update'] )->middleware('check.session')->name('updatetypeconstruction');
Route::get('/gettypeconstructionpar/{id}',[ControllerConstruction::class, 'getConstructionById'] )->middleware('check.session')->name('gettypeconstructionpar');
Route::post('/supptypeconstruction/{id}',[ControllerConstruction::class, 'destroy'] )->middleware('check.session')->name('supptypeconstruction');
Route::post('/rollbacktypeconstruction/{id}',[ControllerConstruction::class, 'updateetat'] )->middleware('check.session')->name('rollbacktypeconstruction');



//Typelocation
Route::get('/typelocationaff',[ControllerTypelocation::class, 'index'])->middleware('check.session')->name('affichertypelocation');
Route::post('/typelocationi',[ControllerTypelocation::class, 'store'])->middleware('check.session')->name('insertiontypelocation');
Route::post('/updatetypelocation/{id}',[ControllerTypelocation::class, 'update'] )->middleware('check.session')->name('updatetypelocation');
Route::get('/gettypelocationpar/{id}',[ControllerTypelocation::class, 'getTypelocationById'] )->middleware('check.session')->name('gettypelocationpar');
Route::post('/supptypelocation/{id}',[ControllerTypelocation::class, 'destroy'] )->middleware('check.session')->name('supptypelocation');
Route::post('/rollbacktypelocation/{id}',[ControllerTypelocation::class, 'updateetat'] )->middleware('check.session')->name('rollbacktypelocation');


//Bien Immobilier
Route::get('/maisonaff',[ControllerMaison::class, 'index'])->middleware('check.session')->name('affichermaison');
Route::post('/maisoni',[ControllerMaison::class, 'store'])->middleware('check.session')->name('maisoninsertion');
Route::post('/suppmaison/{id}',[ControllerMaison::class, 'destroy'] )->middleware('check.session')->name('suppmaison');
Route::post('/rollbackmaison/{id}',[ControllerMaison::class, 'updateetat'] )->middleware('check.session')->name('rollbackmaison');
Route::get('/getmaisonpar/{id}',[ControllerMaison::class, 'getMaisonById'] )->middleware('check.session')->name('getmaisonpar');
Route::post('/updatemaison/{id}',[ControllerMaison::class, 'update'] )->middleware('check.session')->name('updatemaison');


//Typelocation
Route::get('/typelappartementaff',[ControllerTypeappartement::class, 'index'])->middleware('check.session')->name('affichertypeappartement');
Route::post('/typeappartementi',[ControllerTypeappartement::class, 'store'])->middleware('check.session')->name('typeappartementi');
Route::post('/supptypeappartement/{id}',[ControllerTypeappartement::class, 'destroy'] )->middleware('check.session')->name('supptypeappartement');
Route::post('/rollbacktypeappartement/{id}',[ControllerTypeappartement::class, 'updateetat'] )->middleware('check.session')->name('rollbacktypeappartement');
Route::get('/gettypeappartementpar/{id}',[ControllerTypeappartement::class, 'getTypeappartementById'] )->middleware('check.session')->name('gettypeappartementpar');
Route::post('/updateypeappartement/{id}',[ControllerTypeappartement::class, 'update'] )->middleware('check.session')->name('updateypeappartement');


//Appartement
Route::get('/afficherappartement',[ControllerAppartement::class, 'index'])->middleware('check.session')->name('afficherappartement');
Route::post('/appartementi',[ControllerAppartement::class, 'store'])->middleware('check.session')->name('appartementi');
Route::post('/suppapppartement/{id}',[ControllerAppartement::class, 'destroy'] )->middleware('check.session')->name('suppapppartement');
Route::post('/rollbackappartement/{id}',[ControllerAppartement::class, 'updateetat'] )->middleware('check.session')->name('rollbackappartement');
Route::get('/getappartementpar/{id}',[ControllerAppartement::class, 'getappartementById'] )->middleware('check.session')->name('getappartementpar');
Route::post('/updateappartement/{id}',[ControllerAppartement::class, 'update'] )->middleware('check.session')->name('updateappartement');
Route::get('/nmbredispoappart',[ControllerAppartement::class, 'getNmbreDispoappart'] )->middleware('check.session')->name('affichernmbredispoappart');


//Locataire
Route::get('/afficherlocataire',[ControllerLocataire::class, 'index'])->middleware('check.session')->name('afficherlocataire');
Route::post('/locatairei',[ControllerLocataire::class, 'store'])->middleware('check.session')->name('locatairei');
Route::get('/getlocatairepar/{id}',[ControllerLocataire::class, 'getLocataireByIdSecond'] )->middleware('check.session')->name('getlocatairepar');

Route::get('/getlocatairesecondpar/{id}/{idnum}',[ControllerLocataire::class, 'getLocataireByIdThird'] )->middleware('check.session')->name('getlocatairepar');

Route::post('/updatelocataire/{id}',[ControllerLocataire::class, 'update'] )->middleware('check.session')->name('updatelocataire');
Route::get('/nmbrelocataires',[ControllerLocataire::class, 'getNmbreLocataires'] )->middleware('check.session')->name('affichernmbrelocataires');


Route::get('/getoptions/{id}', [AffichernumappartController::class, 'getOptions']);

Route::get('/getoptionsapartloc/{id}', [AffichernumappartlocatController::class, 'getOptions']);

Route::get('/getoptionsloc/{id}', [AffichernomlocatController::class, 'getOptions']);

Route::get('/getoptionsdenominpardetenteur/{id}', [AffichernomlocatController::class, 'getOptionsdenominpardetenteur']);

Route::get('/getoptionsnumappart/{idenomin}/{id}', [AffichernumappartementController::class, 'getOptions']);

Route::get('/getoptionstravaux/{id}', [AfficherinfostravauxController::class, 'getOptions']);

Route::get('/getLocataire/{id}/{id2}', [AfficherlocataireController::class, 'getOptions']);

Route::get('/getdetails/{id1}/{id2}', [DetailsAppartController::class, 'getdetails']);


Route::get('/immobilier', [TypeImmobilierController::class, 'index'])->name('immobilier.index');


//Travaux
Route::get('/affichertravaux',[ControllerTravaux::class, 'index'])->middleware('check.session')->name('affichertravaux');
Route::post('/travauxi',[ControllerTravaux::class, 'store'])->middleware('check.session')->name('travauxi');
Route::get('/gettravauxpar/{id}/{id2}',[ControllerTravaux::class, 'getLocataireByIdSecond'] )->middleware('check.session')->name('gettravauxpar');

Route::post('/updatetravaux/{id}',[ControllerTravaux::class, 'update'] )->middleware('check.session')->name('updatetravaux');

Route::post('/supprimetravaux/{id}',[ControllerTravaux::class, 'deletetravaux'] )->middleware('check.session')->name('supprimetravaux');

//paiement Loyer
Route::get('/getAppartLocataire/{id}/{id2}', [afficherdonneesappartlocataireController::class, 'getOptions']);
Route::post('/paiementloyeri/verifier',[Controllerpaiementloyer::class, 'verifierPaiement'])->middleware('check.session')->name('verifpaiementloyeri');
//Route::post('/paiementloyeri',[Controllerpaiementloyer::class, 'storethird'])->middleware('check.session')->name('paiementloyeri');
//Route::post('/paiementloyeri',[Controllerpaiementloyer::class, 'storefourthsecond'])->middleware('check.session')->name('paiementloyeri');

Route::post('/paiementloyeri',[Controllerpaiementloyer::class, 'storefourththird'])->middleware('check.session')->name('paiementloyeri');

Route::post('/gestionreculoyer',[Controllerpaiementloyer::class, 'genererrecu'])->middleware('check.session')->name('gererreculoyer');


Route::get('/afficherpaiementloyer',[Controllerpaiementloyer::class, 'index'])->middleware('check.session')->name('afficherpaiementloyer');
Route::post('/suppaiementloyer/{id}',[Controllerpaiementloyer::class, 'destroy'] )->middleware('check.session')->name('suppaiementloyer');

Route::get('/paiementloyer/totaux', [Controllerpaiementloyer::class, 'totaux']);

Route::get('/paiementloyer/rechercheavance', [Controllerpaiementloyer::class, 'rechercheAvanceLoyer'])->name('rechercheavance');

//Route::get('/paiementloyer',[ControllerLocataire::class, 'index'])->middleware('check.session')->name('paiementloyer');

//
Route::post('/fluxsortanti',[Controllerfluxsortants::class, 'store'])->middleware('check.session')->name('fluxsortanti');
//Route::get('/afficherfluxsortants',[Controllerfluxsortants::class, 'index'])->middleware('check.session')->name('afficherfluxsortants');
Route::get('/afficherfluxsortants',[Controllerfluxsortants::class, 'index'])->name('afficherfluxsortants');
Route::post('/suppfluxsortant/{id}',[Controllerfluxsortants::class, 'destroy'] )->middleware('check.session')->name('suppfluxsortant');
Route::get('/fluxsortants/totaux', [Controllerfluxsortants::class, 'totaux']);
Route::post('/updateflux/{id}', [Controllerfluxsortants::class, 'update']);


//Route::get('/paiementloyer/export-bilan-locataire/excel', [Controllerpaiementloyer::class, 'exportBilanLocataireExcel']);
/*Route::post('/paiementloyer/export-bilan-locataire/excel',[Controllerpaiementloyer::class, 'exportBilanLocataireExcelsecond']);

Route::get('/paiementloyer/export-bilan-locataire/pdf', [Controllerpaiementloyer::class, 'exportBilanLocatairePdf']);*/

Route::post('/paiementloyer/export-bilan-locataire/excel', [Controllerpaiementloyer::class, 'exportBilanLocataire']);
Route::post('/paiementloyer/export-bilan-locataire/pdf', [Controllerpaiementloyer::class, 'exportBilanLocataire']);

Route::post('/login', [Tableusercontroller::class, 'login'])->name('login');
Route::get('/logout', [Tableusercontroller::class, 'logout'])->name('logout');

Route::get('/defaultinsertion', [Tableusercontroller::class, 'insertData']);



Route::get('/getcachet', [CachetController::class, 'index'])->name('cachet.index');
Route::get('/cachet/{id}', [CachetController::class, 'edit']);
Route::post('/insertioncachet', [CachetController::class, 'store'])->name('cachet.store');
Route::post('/updatecachet/{id}', [CachetController::class, 'update']);
Route::get('/deletecachet/{id}', [CachetController::class, 'destroy']);
Route::post('/rollbackcachet/{id}', [CachetController::class, 'rollbackCachet']);



Route::get('/test',[DetenteursController::class, 'index'])->middleware('check.session')->name('visualiserdetenteurs'); 




