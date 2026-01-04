<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <title>Sites</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />  
    <meta name="csrf-token" content="{{ csrf_token() }}">


     <meta name="author" content="ralph" />
    <link rel="stylesheet" href="{{ asset('assets/buildphone/css/intlTelInput.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/buildphone/css/demo.css') }}" />
    <!-- [Favicon] icon -->
      <link rel="stylesheet" href="{{ asset('assets/css/plugins/datepicker-bs5.min.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/Datatablesimport/jquery.dataTables.min.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
 <!-- [Font] Family -->
 <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/inter/inter.css') }}" id="main-font-link" />
<!-- [phosphor Icons] https://phosphoricons.com/ -->
<link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" />
<script src="{{ asset('js/tech-stack.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />



   <script src="{{ asset('assets/Datatablesimport/jquery-3.6.0.min.js') }}"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style type="text/css">
  .table.dataTable[class*="table-"] thead th {
    background: #f8f9fa;
    background-color: rgb(248, 249, 250);
    background-position-x: 0%;
    background-position-y: 0%;
    background-repeat: repeat;
    background-attachment: scroll;
    background-image: none !important;
    background-size: auto;
    background-origin: padding-box;
    background-clip: border-box;
}

#report-table td, #report-table th {
    text-align: none;
}

div:where(.swal2-container) button:where(.swal2-styled) {
  margin: 0.313em;
  padding: 0.225em 1.1em;
  transition: box-shadow .1s;
  box-shadow: 0 0 0 3px rgba(0,0,0,0);
  font-weight: 500;
}

div:where(.swal2-container) h2:where(.swal2-title) {
  position: relative;
  max-width: 100%;
  margin-top: 20px;
  padding: .8em 1em 0;
  color: inherit;
  font-size: 1em;
  font-weight: 593;
  text-align: center;
  text-transform: none;
  word-wrap: break-word;
  cursor: initial;
}

div.dt-buttons {
  float: none !important;
  margin-bottom:16px!important;
}

div.dt-buttons > .dt-button, div.dt-buttons > div.dt-button-split .dt-button {
margin-top: 6px !important;
 /* background: #e58a00 !important;*/
background: #2ca87f !important;
  color: #fff !important;
 /* border-color: #e58a00 !important;*/
 border-color: #2ca87f !important;
  margin-right: 22px !important;

  border-radius: 6px !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 6px 12px !important;
    font-weight: 500;
}


.form-control {
  display: block;
  width: 100%;
  padding: 1.6em 0.75rem;
  font-size: .875rem;
  font-weight: 400;
  line-height: 1.5;
  color: #131920;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #bec8d0;
    border-top-color: rgb(190, 200, 208);
    border-right-color: rgb(190, 200, 208);
    border-bottom-color: rgb(190, 200, 208);
    border-left-color: rgb(190, 200, 208);
  border-radius: 8px;
  transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

span.iti__country-name{

  color:black;
}

span.iti__dial-code{

  color:black ;
}


.iti__country-name {
  margin-right: var(--iti-spacer-horizontal);
  color: black !important;
}
div.iti {

  width:100%;
}

#phone{
width:100%;

}

.btn-light-info{
  background: #3ec9d6 !important;
  color: #fff !important;
  border-color: #3ec9d6 !important;
}

.custom-swal {
  z-index: 1050 !important;
}

.modal {
 z-index: 1055 !important;; /* Valeur par défaut de Bootstrap */
}


.modal-backdrop {
  z-index: 1050;
}

.boutonpage{
  background: #e58a00 !important;
  color: #fff !important;
  border-color: #e58a00 !important;
  border-radius:5px;
}
.flatpickr-wrapper{
  width:100% !important;
}

.swal2-icon.swal2-info {
  transform: scale(0.7) !important; /* 0.6 = 60% de la taille, tu peux réduire encore */
}
.swal2-actions .btn{
  border-radius:6px !important;
}
</style>

  <script src="{{ asset('assets/distnmberseparateur/number-divider.min.js') }}"></script>
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
   @include('sidemenu.sidenavmenu')
<!-- [ Sidebar Menu ] end -->
 <!-- [ Header Topbar ] start -->
  @include('headermenu.header')
<!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                  <li class="breadcrumb-item" aria-current="page">Paiement Loyer</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Paiement Loyer</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card shadow-none">
              <div class="card-header">
                <h5>Paiement Loyer</h5>
                <div class="card-header-right">
                   <!-- <button type="button" class="btn btn-outline-warning me-2"  id="rechercheavancedialog" style="margin-top: 6px !important;">
                     <i class="fas fa-search me-1"></i> Recherche Avancée
                  </button> -->
                   <button type="button" class="btn btn-outline-warning me-2"  id="recherchedialog" style="margin-top: 6px !important;">
                     <i class="fas fa-search me-1"></i> Recherche
                  </button>
                     <a href="{{ route('paiementloyer') }}"><button type="button" class="btn btn-outline-warning me-2"  id="actualiser" style="margin-top: 6px !important;">
                    <i class="fas fa-sync" aria-hidden="true"></i> Actualiser
                  </button></a>
                  <!--data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                  <button type="button" class="btn btn-primary"  id="showdialog" style="margin-top: 6px !important;">
                    <i class="fas fa-plus"></i> Nouveau
                  </button>
                  <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                     data-bs-backdrop="static" data-bs-keyboard="false"
                  >
                    <div class="modal-dialog" role="document" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titlemaison">Paiement Loyer</span></h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form id="deteteursForm" method="post" >
                            @csrf
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0" style="display:none;" 
                              >We'll never share your email with anyone else.</small
                            >
                                <div class="mb-3">
       <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label" for="denomination" >Detenteurs</label>
                          
                          <select class="form-select" name="detenteur" id="detenteurform" style='margin-top:10px;' >
                                <option value=""  selected disabled>Sélectionner Detenteur</option>
                              @if(isset($detenteur) && $detenteur->count() > 0)
                                @foreach($detenteur as $detenteuritem)
                                    <option value="{{ $detenteuritem->id }}">{{ ucwords(strtolower($detenteuritem->libelledetenteurs)) }}</option>
                                @endforeach
                              @endif
                            </select>

                            </div>
                            <div class="mb-3">
       <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label" for="denomination" >Denomination Maison</label>
                          
                          <select class="form-select" name="denomination" id="denomination" style='margin-top:10px;' required>
                                <!--<option value="">Sélectionner Denomination Maison</option>
                              @if(isset($denominationmaison) && $denominationmaison->count() > 0)
                                @foreach($denominationmaison as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->denomination)) }}</option>
                                @endforeach
                              @endif  -->
                            </select>

                            </div>

                             <div class="mb-3">
                            <label for="nomlocataire" class="form-label">Locataire</label>
                           <div style="display:flex;">  
                     <select class="form-select" name="nomlocataire" id="nomlocataire" required>
                                <option value="">Sélectionner Locataire</option>
                              
                          
                            </select>
                          </div>
                        </div> 
   <div class="mb-3">
                            <label for="numappartement" class="form-label">Numero Appartement</label>
                           <div style="display:flex;">  
                     <select class="form-select" name="numappartement" id="numappartement" required>
                                <option value="">Sélectionner Numero Appartement</option>
                              
                          
                            </select><button class="btn btn-light-info" style="margin-left:12px;border-radius: 9px !important; background: #3ec9d6 !important;color: #fff !important;border-color: #3ec9d6 !important;" id="detailsappartement" >Details</button>
                          </div>
                        </div> 
                             <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" style="color:red;" name="nom" id="nom" value="" placeholder="Saisissez le nom" readonly />
                               
                        </div>

                            <div class="mb-3">
                            <label for="montantloyer" class="form-label">Montant Loyer</label>
                           <input type="text" class="form-control" name="montantloyer" style="color:red;" id="montantloyer" value=""  readonly />

                        </div> 
           <div class="mb-3" id="versementmensueldiv" style="display:none;">
            
              <label for="periodeversement" class="form-label">Selectionner le mois debut versement</label>
              <div>
              <input type="month" id="periodeversement" name="periodeversement" class="form-control" required>
             </div>

            
          </div>
                            <div class="mb-3">
              <label class="form-label" for="montantmensverse" >Montant Mensuel Verse</label>
                         <input type="text" name="montantmensverse" id="montantmensverse" class="form-control" data-bouncer-message="The domain portion of the email address is invalid (the portion after the @)." required="" aria-describedby="bouncer-error_email" aria-invalid="true">
                            </div>
                               <div class="mb-3">
              <label class="form-label" for="montantmensverse" >Mode Paiement</label>
                        
                         <select class="form-select" name="modepaiement" id="modepaiement" style='margin-top:10px;' required>
                                <option value="" disabled checked>Sélectionner Mode paiement</option>
                              @if(isset($modepaiement) && $modepaiement->count() > 0)
                                @foreach($modepaiement as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->libellemodepaiement )) }}</option>
                                @endforeach
                              @endif
                            </select>
                            </div>
                             <div class="mb-3" style='display:none;' >
                            <label for="typelocation" class="form-label">Mois</label>
                            <div style="margin-bottom: 10px;">
                         <input type="checkbox" id="checkAll" class="form-check-input" style="border-color: red;">
  <label for="checkAll" class="form-check-label" style="margin-left:10px;color:red;">Tout cocher / décocher</label>
                            </div>
                         <div class="row">
                         <div class="col-md-4 mb-3">
                          <div class="form-check form-check-inline">
                          <input type="checkbox" class="form-check-input input-primary" name="mois[]" id="janvier" value="01" checked="checked" data-gtm-form-interact-field-id="1"><label class="form-check-label" for="customCheckinl31" style="margin-left: 10px;">Janvier</label>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="fevrier" value="02" name="mois[]" data-gtm-form-interact-field-id="0"> <label class="form-check-label" for="customCheckinl321" style="margin-left: 10px;" >Fevrier</label>
                          </div>
                           </div>

                       <div class="col-md-4 mb-3">
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="mars" name="mois[]" value="03" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Mars</label>
                          </div>
                          </div>

                       
                           
                        </div>

                         <div class="row" style="margin-top:10px;">

                             <div class="col-md-4 mb-3">
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="avril" name="mois[]" value="04" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Avril</label>
                          </div>
                           </div>

<div class="col-md-4 mb-3">
                            <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="mai" name="mois[]" value="05" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Mai</label>
                          </div>

                        </div>



                          <div class="col-md-4 mb-3">

                           <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="juin" name="mois[]" value="06" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Juin</label>
                          </div>
</div>





                        </div>

                        <div class="row" style="margin-top:10px;">

                          <div class="col-md-4 mb-3">
                          <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="juillet" name="mois[]" value="07" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Juillet</label>
                          </div>
</div>

                          <div class="col-md-4 mb-3">
                             <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="aout" name="mois[]" value="08" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Aout</label>
                          </div>
                        </div>

                <div class="col-md-4 mb-3">
                  <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="Septembre" name="mois[]" value="09" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Septembre</label>
                          </div>
                        </div>





                          </div>

<div class="row" style="margin-top:10px;">
  <div class="col-md-4 mb-3">
                             <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="Octobre" name="mois[]" value="10" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Octobre</label>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">

                           <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="novembre" name="mois[]" value="11" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Novembre</label>
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">

                           <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input input-primary" id="decembre" name="mois[]" value="12" > <label class="form-check-label" for="customCheckinl331" style="margin-left: 10px;">Decembre</label>
                          </div>
                        </div>
                      </div>

                        </div> 

                            <div class="mb-3">
                            <label for="annee" class="form-label">Annee</label>
                      <select class="form-select" name="annee" id="annee" style='margin-top:10px;' required>
                                <option value="2025">2025</option>
                             
                                <option value="2026">2026</option>
                            
                            </select>
                        </div> 

                           <div class="mb-3">
                            <label for="datevers" class="form-label">Date Versement</label>
                           <input type="date" class="form-control" name="datevers" id="datevers" value="" style="padding: 0.6em 0.75rem !important;height: 45px;" placeholder="Selectionner Date versement" required />

                        </div> 

               
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-light-primary">Enregistrer</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

    <div
                    class="modal fade"
                    id="exampleModaldetails"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                     data-bs-backdrop="static" data-bs-keyboard="false"
                  >
                    <div class="modal-dialog" role="document" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titlemaison">Details Appartement</span></h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                           <div class="modal-body">
                            <table id="tabledetailsapp" class="table table-bordered table-striped mb-0">
                               <thead>
                      <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Nom Maison : </th>
                        <th class="border-top-0" style="text-transform: none !important;"><span id="nomappartemnent" ></span></th>
                      </tr>
                        <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Detenteur : </th>
                        <th class="border-top-0" style="text-transform: none !important;"><span id="detenteur" ></span></th>
                      </tr>
                         <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Numero Appartement : </th>
                        <th class="border-top-0" style="text-transform: none !important;"><span id="numeroappart" ></span></th>
                      </tr>
                      <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Type Appartement : </th>
                        <th class="border-top-0" style="text-transform: none !important;"><span id="typeappart" ></span></th>
                      </tr>
                        <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Localisation : </th>
                        <th class="border-top-0" style="text-transform: none !important;"><span id="localisation" ></span></th>
                      </tr>
                            </table>
                           </div>
                             <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Fermer</button>
                           
                          </div>

                      </div>
                    </div>


 </div>

                </div>
              </div>
              <div class="card-body shadow border-0">
                <div class="table-responsive" >
                  <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Id</th>
                         <th class="border-top-0" style="text-transform: none !important;">Detenteur</th>
                        <th class="border-top-0" style="text-transform: none !important;">Denomination Maison</th>
                        <th class="border-top-0" style="text-transform: none !important;">Num Appart</th>
                        <th class="border-top-0" style="text-transform: none !important;">Nom</th>
                         <th class="border-top-0" style="text-transform: none !important;">Montant Loyer</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Montant verse</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Mode versement</th>
                         <th class="border-top-0" style="text-align:center;text-transform: none !important;">Mois Loyer</th>
                          <th class="border-top-0" style="text-align:center;text-transform: none !important;">Reliquat Loyer</th>
                        <th class="border-top-0" style="text-transform: none !important;">Date versement</th>
                        <th class="border-top-0" style="text-transform: none !important;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>
                </div>
<div id="totaux">

                 </div>
                   <div id="exportBilanBtnContainer" class="mt-3"></div>
                  
              </div>
 <!--- Recherche Mpdal  -->

<!-- Modal Exportation Bilan -->
<div class="modal fade" id="exportBilanModal" tabindex="-1" aria-labelledby="exportBilanModalLabel" aria-hidden="true" aria-hidden="true"
                     data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- En-tête -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exportBilanModalLabel">Exporter le bilan du locataire</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Corps -->
      <div class="modal-body">
        <form id="exportBilanForm">
          <input type="hidden" id="idlocataire" name="idlocataire">

          <div class="row">
            <div class="col-md-12">
              <label for="mois_debut" class="form-label">Selectionner le Mois Ou Plage Mois</label>
              <input type="month" id="periode" name="periode" class="form-control" required>
            </div>

            
          </div>
        </form>
      </div>

      <!-- Pied -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style='border-radius:6px;'>Annuler</button>
        <button type="button" id="exportExcelBtn" class="btn btn-success mt-2" style='border-radius:6px;'>
                    <i class="fa fa-file-excel" style="margin-right: 5px;"></i>Exporter en Excel</button>
        <button type="button" id="exportPdfBtn" class="btn btn-danger mt-2" style='border-radius:6px;'>
            <i class="fa fa-file-pdf" style="margin-right: 5px;" ></i>Exporter en PDF</button>
      </div>

    </div>
  </div>
</div>


<!-- Modal Exportation recu -->
<div class="modal fade" id="exportrecuModal" tabindex="-1" aria-labelledby="exportrecuModalLabel" aria-hidden="true" aria-hidden="true"
                     data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- En-tête -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exportrecuModalLabel">Exporter Reçu du locataire</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Corps -->
      <div class="modal-body">
        <form id="exportrecuForm">
          <input type="hidden" id="idlocatairerecu" name="idlocataire">

          <div class="row">
            <div class="col-md-12">
              <label for="mois_debut" class="form-label">Selectionner Jour Paiement</label>
              <input type="month" id="perioderecu" name="periode" class="form-control" required>
            </div>

            
          </div>
        </form>
      </div>

      <!-- Pied -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style='border-radius:6px;'>Annuler</button>
      
        <button type="button" id="exportrecuPdfBtn" class="btn btn-danger mt-2" style='border-radius:6px;'>
            <i class="fa fa-file-pdf" style="margin-right: 5px;" ></i>Exporter en PDF</button>
      </div>

    </div>
  </div>
</div>



            </div>
          </div>
        </div>


        
		
		<div class="row">
          <div class="col-lg-12">
            <div class="card shadow-none">
              <div class="card-header">
                <h5>Recherches Avancées</h5>
                <div class="card-header-right">
                  <!--data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                 <button type="button" class="btn btn-outline-warning me-2"  id="rechercheavancedialog" style="float:right;margin-top: 6px !important;">
                     <i class="fas fa-search me-1"></i> Recherche Avancée
                  </button>
               
                </div>
              </div>
              <div class="card-body shadow border-0">
                <div class="table-responsive">
            
                    <h5 id="titre-recherche-avance" class="text-center mb-3" style="display:none;"></h5> 
                   <table id="report-table-avance" class="table table-bordered table-striped mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Id</th>
                         <th class="border-top-0" style="text-transform: none !important;">Detenteur</th>
                        <th class="border-top-0" style="text-transform: none !important;">Denomination Maison</th>
                        <th class="border-top-0" style="text-transform: none !important;">Num Appart</th>
                        <th class="border-top-0" style="text-transform: none !important;">Nom</th>
                         <th class="border-top-0" style="text-transform: none !important;">Montant Loyer</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Montant verse</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Mode versement</th>
                         <th class="border-top-0" style="text-align:center;text-transform: none !important;">Mois Loyer</th>
                          <th class="border-top-0" style="text-align:center;text-transform: none !important;">Reliquat Loyer</th>
                        <th class="border-top-0" style="text-transform: none !important;">Date versement</th>
                        <th class="border-top-0" style="text-transform: none !important;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>

        <!--- Recherche Mpdal  -->
        <div class="modal fade"
                    id="rechercheModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="rechercheModalLabel"
                    aria-hidden="true"
                     data-bs-backdrop="static" data-bs-keyboard="false"
                  >
  <div class="modal-dialog" role="document" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="rechercheModalLabel"
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titlemaison">Recherche</span></h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form id="rechercheForm" method="post" >
                            @csrf
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0" style="display:none;" 
                              >We'll never share your email with anyone else.</small
                            >
                              <div class="mb-3">
       <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label" for="denomination" >Detenteurs</label>
                          
                          <select class="form-select" name="detenteur" id="detenteurrech" style='margin-top:10px;' >
                                <option value=""  selected disabled>Selectionner Detenteur</option>
                              @if(isset($detenteur) && $detenteur->count() > 0)
                                @foreach($detenteur as $detenteuritem)
                                    <option value="{{ $detenteuritem->id }}">{{ ucwords(strtolower($detenteuritem->libelledetenteurs)) }}</option>
                                @endforeach
                              @endif
                            </select>

                            </div>
                            <div class="mb-3">
       <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label" for="denomination" >Denomination Maison</label>
                          
                         <select class="form-select" name="denomination" id="denominationrech" style='margin-top:10px;' >
                         <option value="" selected disabled>Selectionner Denomination Maison</option>     
                         <!--  <option value="" selected disabled>Sélectionner Denomination Maison</option>
                              @if(isset($denominationmaison) && $denominationmaison->count() > 0)
                                @foreach($denominationmaison as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->denomination)) }}</option>
                                @endforeach
                              @endif  -->
                            </select>

                            </div>

                             <div class="mb-3">
                            <label for="nomlocataire" class="form-label">Locataire</label>
                           <div style="display:flex;">  
                     <select class="form-select" name="nomlocataire" id="nomlocatairerech" >
                                <option value="" selected disabled>Sélectionner Locataire</option>
                              
                          
                            </select>
                          </div>
                        </div> 
   <div class="mb-3">
                            <label for="numappartement" class="form-label">Numero Appartement</label>
                           <div style="display:flex;">  
                     <select class="form-select" name="numappartement" id="numappartementrech" >
                                <option value="" selected disabled >Sélectionner Numero Appartement</option>
                              
                          
                            </select>     </div>
                        </div> 
                     
           <div class="mb-3">
            
              <label for="mois_debut" class="form-label">Selectionner Le mois Versement Loyer</label>
              <input type="month" id="perioderech" name="perioderech" class="form-control" >
            

            
          </div>
                      
                         
                        

                        



                            <div class="mb-3">
                            <label for="annee" class="form-label">Annee</label>
                      <select class="form-select" name="annee" id="anneerech" style='margin-top:10px;' >
                                <option value="2025">2025</option>
                             
                                <option value="2026">2026</option>
                            
                            </select>
                        </div> 

                        

               
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-light-primary">Valider</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>


                   <!--- Recherche Mpdal  -->
        <div class="modal fade"
                    id="rechercheModalavances"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="rechercheModalLabel"
                    aria-hidden="true"
                     data-bs-backdrop="static" data-bs-keyboard="false"
                  >
  <div class="modal-dialog" role="document" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="rechercheModalLabel"
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titlemaison">Recherche Avancée</span></h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form id="rechercheavanceForm" method="post" >
                            @csrf
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0" style="display:none;" 
                              >We'll never share your email with anyone else.</small
                            >
                              <div class="mb-3">
       <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label" for="denomination" >Detenteurs</label>
                          
                          <select class="form-select" name="detenteur" id="detenteurrechavance" style='margin-top:10px;' >
                                <option value=""  selected disabled>Selectionner Detenteur</option>
                              @if(isset($detenteur) && $detenteur->count() > 0)
                                @foreach($detenteur as $detenteuritem)
                                    <option value="{{ $detenteuritem->id }}">{{ ucwords(strtolower($detenteuritem->libelledetenteurs)) }}</option>
                                @endforeach
                              @endif
                            </select>

                            </div>
                            <div class="mb-3">
       <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label" for="denomination" >Denomination Maison</label>
                          
                         <select class="form-select" name="denomination" id="denominationavancerech" style='margin-top:10px;' >
                         <option value="" selected disabled>Selectionner Denomination Maison</option>     
                         <!--  <option value="" selected disabled>Sélectionner Denomination Maison</option>
                              @if(isset($denominationmaison) && $denominationmaison->count() > 0)
                                @foreach($denominationmaison as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->denomination)) }}</option>
                                @endforeach
                              @endif  -->
                            </select>

                            </div>

      <div class="mb-3">
       <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label" for="optionrechavance" >Options</label>
                          
                          <select class="form-select" name="optionrechavance" id="optionrechavance" style='margin-top:10px;' >
                                <option value="" selected disabled>Sélectionner une Option </option>
                                    <option value="paye">Loyer Payé</option>
                                    <option value="impaye">Loyer Impayé</option>
                                    <option value="partiel">Loyer Partiel Payé</option>
                            </select>

                            </div>
                     
           <div class="mb-3">
            
              <label for="mois_debut" class="form-label">Selectionner Le mois Loyer</label>
              <input type="month" id="perioderechavance" name="perioderechavance" class="form-control" >
            

            
          </div>
  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-light-primary">Valider</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

		
        <!-- [ Main Content ] end -->
      </div>
    </div>
    <!-- [ Main Content ] end -->
  <!-- [ footer ] start -->
  @include('footer.footer')
<!-- [ footer ] end -->
 <!-- Required Js -->
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datepicker-full.min.js') }}"></script>
    <script src="build/js/intlTelInputWithUtils.js"></script>

<script>
      // minimum setup
      (function () {
        const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
          buttonClass: 'btn'
        });
      })();

        (function () {
        const d_week = new Datepicker(document.querySelector('#pc-datepicker-2'), {
          buttonClass: 'btn'
        });
      })();
    </script>
   


<script>
  layout_change('light');
</script>
  
<script>
  change_box_container('false');
</script>
 
<script>
  layout_caption_change('true');
</script>
 
<script>
  layout_rtl_change('false');
</script>
 
<script>
  preset_change('preset-1');
</script>
 
<script>
  main_layout_change('vertical');
</script>

<!--
<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>


<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatablesimport/dataTables.buttons.min.js') }}"></script>


<script src="{{ asset('assets/Datatablesimport/jszip.min.js') }}"></script>


<script src="{{ asset('assets/Datatablesimport/buttons.html5.min.js') }}"></script> -->



<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.6.0/css/searchBuilder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>


  <!-- JSZip (nécessaire pour Excel) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.6.0/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.4.1/js/dataTables.dateTime.min.js"></script>

<!--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->

<!-- Flatpickr + Plugin -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/fr.js"></script>

 <script src="{{ asset('assets/buildphone/js/intlTelInputWithUtils.js') }}"></script>
 <script src="{{ asset('assets/buildphone/js/libphonenumber.js') }}"></script>
    <!-- [Page Specific JS] start -->
    <script type="module">
     
     /* import { DataTable } from '{{ asset('assets/js/plugins/module.js') }}';
        console.log('Module imported successfully');
      window.dt = new DataTable('#report-table', { rowsPerPage: 5 });
      console.log('DataTable initialized');*/


</script>

<script>
/*flatpickr("#periode", {
    mode: "range",
    plugins: [
        new monthSelectPlugin({
            shorthand: true,
            dateFormat: "Y-m",
            altFormat: "F Y",
        })
    ],
    locale: "fr",
     onClose: function(selectedDates, dateStr, instance) {
        // Si une seule date est sélectionnée, tu peux la traiter comme un mois unique
        if (selectedDates.length === 1) {
            console.log("Un seul mois sélectionné :", dateStr);
        } else if (selectedDates.length === 2) {
            console.log("Plage de mois :", dateStr);
        }
    }
});*/
/*flatpickr("#periode", {
    mode: "range",               // range autorisé
    dateFormat: "Y-m",           // valeur envoyée au backend : 2025-10
    altInput: true,              // affiche un champ lisible (optionnel)
    altFormat: "F Y",            // affichage lisible : "Octobre 2025"
    locale: "fr",
    closeOnSelect: false,        // IMPORTANT: permet de sélectionner début+fin sans fermer au 1er clic
    plugins: [
        new monthSelectPlugin({
            shorthand: false,    // false => "Octobre" / true => "Oct"
            dateFormat: "Y-m",
            altFormat: "F Y",
        })
    ],
    onClose: function(selectedDates, dateStr, instance) {
        // dateStr format attendu en mode range : "2025-01 to 2025-03"
        if (!dateStr) return;

        // Si tu utilises altInput, instance.input donnera la valeur visible
        // Nous utilisons dateStr car il contient les valeurs formattées par dateFormat
        const parts = dateStr.split(" to ");

        if (parts.length === 1) {
            // Un seul mois sélectionné
            const mois = parts[0].trim();
            console.log("Mois unique :", mois); // ex: "2025-10"
            // tu peux mettre la valeur dans un champ caché si besoin
        } else if (parts.length === 2) {
            // Plage de mois
            const moisDebut = parts[0].trim();
            const moisFin = parts[1].trim();
            console.log("Plage :", moisDebut, "->", moisFin); // ex: "2025-01" -> "2025-03"
        }
    }
});*/


let lastDateStr = "";

    const fp = flatpickr("#periode", {
      mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      plugins: [
        new monthSelectPlugin({
          shorthand: false,
          dateFormat: "Y-m",
          altFormat: "F Y"
        })
      ],
      onChange(selectedDates, dateStr, instance) {
        // dateStr est formaté par dateFormat (Y-m ou "Y-m to Y-m")
        // on garde la dernière valeur non vide
        if (dateStr && dateStr.trim() !== "") {
          lastDateStr = dateStr;
          document.getElementById('valeur').textContent = lastDateStr;
        }
      },
      onClose(selectedDates, dateStr, instance) {
        // si seule une date sélectionnée, forcer la valeur après fermeture
        if (selectedDates.length === 1) {
          // Méthode sûre : setDate avec la valeur déjà gardée
          // Utilisation d'un petit délai pour s'assurer que flatpickr a fini ses propres handlers
          setTimeout(() => {
            if (lastDateStr) {
              // setDate accepte string(s) séparées par " to "
              instance.setDate(lastDateStr, true); // true => triggerChange
              document.getElementById('valeur').textContent = lastDateStr;
            }
          }, 10);
        } else if (selectedDates.length === 2) {
          // tout OK : plage complète
          document.getElementById('valeur').textContent = dateStr;
        } else {
          // Aucun choix (ex: annulation) -> ne rien faire
        }
      }
    });

    // utile pour debug console
    window.fp = fp;


    let lastDateStrrech = "";

    const fprech = flatpickr("#perioderech", {
      mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      plugins: [
        new monthSelectPlugin({
          shorthand: false,
          dateFormat: "Y-m",
          altFormat: "F Y"
        })
      ],
      onChange(selectedDates, dateStr, instance) {
        // dateStr est formaté par dateFormat (Y-m ou "Y-m to Y-m")
        // on garde la dernière valeur non vide
        if (dateStr && dateStr.trim() !== "") {
          lastDateStrrech = dateStr;
          document.getElementById('valeur').textContent = lastDateStrrech;
        }
      },
      onClose(selectedDates, dateStr, instance) {
        // si seule une date sélectionnée, forcer la valeur après fermeture
        if (selectedDates.length === 1) {
          // Méthode sûre : setDate avec la valeur déjà gardée
          // Utilisation d'un petit délai pour s'assurer que flatpickr a fini ses propres handlers
          setTimeout(() => {
            if (lastDateStrrech) {
              // setDate accepte string(s) séparées par " to "
              instance.setDate(lastDateStrrech, true); // true => triggerChange
              document.getElementById('valeur').textContent = lastDateStrrech;
            }
          }, 10);
        } else if (selectedDates.length === 2) {
          // tout OK : plage complète
          document.getElementById('valeur').textContent = dateStr;
        } else {
          // Aucun choix (ex: annulation) -> ne rien faire
        }
      }
    });

    // utile pour debug console
    window.fprech = fprech;


  let lastDateStrrechavan = "";
    const fprechavan = flatpickr("#perioderechavance", {
      //mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      plugins: [
        new monthSelectPlugin({
          shorthand: false,
          dateFormat: "Y-m",
          altFormat: "F Y"
        })
      ],
      onChange(selectedDates, dateStr, instance) {
        // dateStr est formaté par dateFormat (Y-m ou "Y-m to Y-m")
        // on garde la dernière valeur non vide
        if (dateStr && dateStr.trim() !== "") {
          lastDateStrrechavan = dateStr;
          document.getElementById('valeur').textContent = lastDateStrrechavan;
        }
      },
      onClose(selectedDates, dateStr, instance) {
        // si seule une date sélectionnée, forcer la valeur après fermeture
        if (selectedDates.length === 1) {
          // Méthode sûre : setDate avec la valeur déjà gardée
          // Utilisation d'un petit délai pour s'assurer que flatpickr a fini ses propres handlers
          setTimeout(() => {
            if (lastDateStrrechavan) {
              // setDate accepte string(s) séparées par " to "
              instance.setDate(lastDateStrrechavan, true); // true => triggerChange
              document.getElementById('valeur').textContent = lastDateStrrechavan;
            }
          }, 10);
        } else if (selectedDates.length === 2) {
          // tout OK : plage complète
          document.getElementById('valeur').textContent = dateStr;
        } else {
          // Aucun choix (ex: annulation) -> ne rien faire
        }
      }
    });

    // utile pour debug console
    window.fprechavan = fprechavan;



        // utile pour debug console
  


  let lastDateStrvers = "";
    const fpvers = flatpickr("#periodeversement", {
      //mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      static: true,
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      plugins: [
        new monthSelectPlugin({
          shorthand: false,
          dateFormat: "Y-m",
          altFormat: "F Y"
        })
      ],
      onChange(selectedDates, dateStr, instance) {
        // dateStr est formaté par dateFormat (Y-m ou "Y-m to Y-m")
        // on garde la dernière valeur non vide
        if (dateStr && dateStr.trim() !== "") {
          lastDateStrvers = dateStr;
          document.getElementById('valeur').textContent = lastDateStrvers;
        }
      },
      onClose(selectedDates, dateStr, instance) {
        // si seule une date sélectionnée, forcer la valeur après fermeture
        if (selectedDates.length === 1) {
          // Méthode sûre : setDate avec la valeur déjà gardée
          // Utilisation d'un petit délai pour s'assurer que flatpickr a fini ses propres handlers
          setTimeout(() => {
            if (lastDateStrvers) {
              // setDate accepte string(s) séparées par " to "
              instance.setDate(lastDateStrvers, true); // true => triggerChange
              document.getElementById('valeur').textContent = lastDateStrvers;
            }
          }, 10);
        } else if (selectedDates.length === 2) {
          // tout OK : plage complète
          document.getElementById('valeur').textContent = dateStr;
        } else {
          // Aucun choix (ex: annulation) -> ne rien faire
        }
      }
    });

    // utile pour debug console
    window.fpvers = fpvers;

    
    
let lastDateStrrecu = "";

  const fprecu = flatpickr("#perioderecu", {
  dateFormat: "Y-m-d",      
  altInput: true,
  altFormat: "d F Y",    
  locale: "fr",
  closeOnSelect: false,
  onChange(selectedDates, dateStr, instance) {
    if (dateStr && dateStr.trim() !== "") {
      lastDateStrrecu = dateStr;
      document.getElementById('valeur').textContent = lastDateStrrecu;
    }
  },
  onClose(selectedDates, dateStr, instance) {
    setTimeout(() => {
      if (lastDateStrrecu) {
        instance.setDate(lastDateStrrecu, true);
        document.getElementById('valeur').textContent = lastDateStrrecu;
      }
    }, 10);
  }
});


    // utile pour debug console
    window.fprecu = fprecu;

</script>


<script>

 /* $('#periode').daterangepicker({
    locale: { format: 'YYYY-MM' },
    startDate: moment().startOf('year'),
    endDate: moment(),
    minDate: moment().startOf('year'),
    maxDate: moment(),
    showDropdowns: true,
    opens: 'left'
});*/
$("#exportrecuPdfBtn").on('click', function() {

    const idLocataire = $('#idlocatairerecu').val();
    const periode = $('#perioderecu').val();

    if (!idLocataire || !periode) {
        alert('Veuillez sélectionner un locataire et le jour.');
        return;
    }
//alert(idLocataire+" "+periode);
      $.ajax({
    url: '/gestionreculoyer',
    type: 'POST',
    data: {
        idlocataire: idLocataire,
        periode: periode,
        _token: $('meta[name="csrf-token"]').attr('content')
    },
    //xhrFields: { responseType: 'blob' },
    success: function(response) {

          if (response.success) {
       // $('#exportrecuModal').modal('hide');

      // alert("Url Lien : "+response.recu_url);
         if (response.recu_url) {
          $('#exportrecuModal').modal('hide');
            window.open(response.recu_url, '_blank');

        } else {
            Swal.fire({
                icon: 'warning',
                title: '⚠️ Reçu introuvable',
                text: 'Aucun reçu disponible pour ce paiement.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#6c757d'
            });
        }
          }
          else{
            //alert(""+response.message);

             Swal.fire({
                icon: 'warning',
                title: '⚠️Message',
                text: ''+response.message,
                confirmButtonText: 'OK',
                confirmButtonColor: '#6c757d'
            });
          }

    },
    error: function(xhr) {
        let message = "Erreur lors de l'exportation.";

        // ▸ Cas 1 : Laravel retourne du texte JSON normal (422, 500, 404…)
        if (xhr.responseText) {
            try {
                const json = JSON.parse(xhr.responseText);
                message = json.message ?? message;
            } catch (e) {
                message = xhr.responseText;
            }
           // alert("error : "+message);

              Swal.fire({
                icon: 'warning',
                title: '⚠️Message',
                text: ''+message,
                confirmButtonText: 'OK',
                confirmButtonColor: '#6c757d'
            });
            return;
        }


        // ▸ Cas 3 : Rien du tout
        alert(message);
    }
});

});


$('#exportExcelBtn, #exportPdfBtn').on('click', function() {
    const format = this.id === 'exportExcelBtn' ? 'excel' : 'pdf';
    const idLocataire = $('#idlocataire').val();
    const periode = $('#periode').val();

    if (!idLocataire || !periode) {
        alert('Veuillez sélectionner un locataire et une plage de mois.');
        return;
    }
//alert(format);
    $.ajax({
        url: '/paiementloyer/export-bilan-locataire/' + format,
        type: 'POST',
        data: {
            idlocataire: idLocataire,
            periode: periode,
            format: format,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        xhrFields: { responseType: 'blob' },
        success: function(response, status, xhr) {
            const blob = new Blob([response], { type: xhr.getResponseHeader('Content-Type') });
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = xhr.getResponseHeader('Content-Disposition')
                .split('filename=')[1].replaceAll('"', '');
            link.click();
            $('#exportBilanModal').modal('hide');
        },
        error: function() {
            alert("Erreur lors de l'exportation du bilan.");
        }
    });
});



       $('#numappartement').change(function () {
            var id = $(this).val();
            var denomination=$("#denomination").val();

            //alert(id+" "+denomination);


              $.ajax({
                    url: '/getAppartLocataire/' + denomination+"/"+id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);


                      $("#nom").val(response.locataire);
                       $("#montantloyer").val(response.appart);

                        $("#montantmensverse").val(response.appart);
                      //alert(response.locataire+" "+response.appart);
                       console.log(response.appart);



                    },
                     error: function(error) {
                    console.log(error);

                    alert(error);

                  }
                });





});
  
   document.getElementById("montantmensverse").addEventListener("input", function (e) {
       this.value = this.value.replace(/[^0-9]/g, ""); // Allow only digits
   });
      /*document.getElementById("nbmremoiscaution").addEventListener("input", function (e) {
       this.value = this.value.replace(/[^0-9]/g, ""); // Allow only digits
   });*/


      $('#montantmensverse').divide({

    delimiter: ' '

  });
      

$(document).ready(function() {
    $(".montantloyerclass").each(function() {
      let montant = $(this).text(); // Récupérer le texte actuel
      let montantFormate = Number(montant).toLocaleString('fr-FR'); // Formater avec séparateur
      $(this).text(montantFormate); // Mettre à jour l'affichage
    });
  });
    
</script>


   <script type="module">


var tablerecherche;
 tablerechercheavance;

    document.addEventListener("DOMContentLoaded", function () {

$.getJSON('/paiementloyer/totaux', {

    detenteur: $('#detenteurrech').val(),
    denomination: $('#denominationrech').val(),
    nomlocataire: $('#nomlocatairerech').val(),
    numappartement: $('#numappartementrech').val(),
    annee: $('#anneerech').val()
}, function(data){
console.log(data);
 // alert(data);

if (data.totalReliquatvrai > 0) { 
    // Reliquat dû
    $('#totaux').html(
        `<b>Total versé :</b> ${data.totalVerse} FCFA <br>
         <b>Total reliquat :</b> <label style="color:red;font-weight:bold;">${data.totalReliquat} FCFA</label>`
    );
} else{

   $('#totaux').html(
        `<b>Total versé :</b> ${data.totalVerse} FCFA <br>
         <b>Total reliquat :</b> ${data.totalReliquat} FCFA`
    );

}
 
});

  tablerecherche=$('#report-table').DataTable({
     lengthMenu: [ [5,10, 25, 50, 100, -1], [5,10, 25, 50, 100, "Tous"] ],
      pageLength: 5,
      processing: true,
    serverSide: true,
    scrollX: false,   // désactive le scroll horizontal
    autoWidth: false, // empêche que DataTables ajoute des largeurs trop grandes
    responsive: true,
     
        //ajax: '{{ route("afficherpaiementloyer") }}', // Fetch data via AJAX
         ajax: {
            url: '{{ route("afficherpaiementloyer") }}',
            data: function (d) {
                d.detenteur= $('#detenteurrech').val();
                d.denomination = $('#denominationrech').val();
                d.nomlocataire = $('#nomlocatairerech').val();
                d.numappartement = $('#numappartementrech').val();
                d.annee = $('#anneerech').val();
                d.perioderech=$('#perioderech').val();

                d.perioderechavance=$('#perioderechavance').val();
                d.optionrechavance=$('#optionrechavance').val();
                d.denominationavancerech=$('#denominationavancerech').val();
                d.detenteurrechavance=$('#detenteurrechavance').val();

                        console.log("Données envoyées au serveur :", d); // <- Ici !
            }
        },
         dom: 'Blfrtip', // Ajout des boutons d'exportation 
    buttons: [
          {
     extend: 'colvis',
    text: '🛠️ Colonnes à afficher',
    titleAttr: 'Afficher ou masquer les colonnes',
    className: 'btn btn-outline-primary btn-sm rounded-pill shadow-sm px-3'

},
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> Exporter Excel',
            className: 'btn btn-success',
            title: 'Paiement Loyer'
        }
    ],
    //'iddenomination','numappartement','nom','prenom','numero1','numero2','adresseemail','occupation','montantcaution','dateentree','datesortie','reliquatcaution'

    

        columns: [
            {data: 'id', name: 'id'}, 
            {data: 'detenteur', name: 'detenteur'}, 
            {data: 'denomination', name: 'denomination'}, // Famille name
            {data: 'numappart', name: 'numappart'}, 
            {data: 'nomlocataire', name: 'nomlocataire'},
        {data: 'montantloyer', name: 'montantloyer'},
            {data: 'montantverse', name: 'montantverse'},
             {data: 'modepaiementloyer', name: 'modepaiementloyer'},
               {data: 'moispaieloyere', name: 'moispaieloyere'},
                {data: 'relicatloyer', name: 'relicatloyer'},
            {data: 'daterengloyer', name: 'daterengloyer'},
         
           

           
       
            {data: 'action', name: 'action', orderable: false, searchable: false}, // Operations (edit/delete buttons)
        ],
         language: {
                    searchBuilder: {
        title: '🔎 Filtrage avancé',
        condition: 'Condition',
        data: 'Colonne',
        delete: '❌ Supprimer',
        value: 'Valeur',
        add: '➕ Ajouter une condition',
        clearAll: '🧹 Tout effacer',
        logicAnd: "Et",
        search: "Rechercher",
        logicOr: "Ou",
         conditions: {
             string: {
                    equals: 'Égale à',
                    not: 'Différent de',
                    startsWith: 'Commence par',
                    notStartsWith: 'Ne commence pas par',
                    contains: 'Contient',
                    notContains: 'Ne contient pas',
                    endsWith: 'Finit par',
                    notEnds: 'Ne finit pas par',
                    empty: 'Vide',
                    notEmpty: 'Non vide'
                },
                number: {
                    equals: 'Égale à',
                    not: 'Différent de',
                    lt: 'Inférieur à',
                    lte: 'Inférieur ou égal à',
                    gt: 'Supérieur à',
                    gte: 'Supérieur ou égal à',
                    between: 'Entre',
                    notBetween: 'Pas entre',
                    empty: 'Vide',
                    notEmpty: 'Non vide'
                },
                date: {
                    equals: 'Égale à',
                    not: 'Différent de',
                    before: 'Avant',
                    after: 'Après',
                    between: 'Entre',
                    notBetween: 'Pas entre',
                    empty: 'Vide',
                    notEmpty: 'Non vide'
                }
        }
    },
    "oPaginate": {
            "sFirst":    "Premier",
            "sLast":     "Dernier",
            "sNext":     "Suivant",
            "sPrevious": "Précédent"
        },

    lengthMenu: "Afficher _MENU_ entrées",
    zeroRecords: "Aucune donnée trouvée",
    info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
    infoEmpty: "Affichage de 0 à 0 sur 0 entrées",
    infoFiltered: "(filtré depuis _MAX_ entrées totales)",
    search: "🔍 Recherche globale :",
             
          //  url:"/datatables/i18n/fr-FR.json"
        },
        

      });



         $('#rechercheavanceForm').on('submit', function(e) {
        e.preventDefault();
      
        //tablerecherche.ajax.reload();

    let detenteur = $('#detenteurrechavance').val();
    let denomination = $('#denominationavancerech').val();
    let optionrechavance = $('#optionrechavance').val();
    let perioderechavance = $('#perioderechavance').val();

    // Vérifie si le mois est bien sélectionné
    if (!perioderechavance) {
        alert('Veuillez sélectionner un mois.');
        return;
    }

    let option = $('#optionrechavance').val();
    let moisInput = $('#perioderechavance').val();
    let denominationavancerech = $('#denominationavancerech option:selected').text();
    let detenteurtext = $('#detenteurrechavance option:selected').text();

    // 👉 Définir l’intitulé de la recherche
    let titre = "Résultats de la recherche : ";

    if (option === "paye") titre += "Loyers payés ";
    else if (option === "impaye") titre += "Loyers impayés ";
    else if (option === "partiel") titre += "Loyers partiellement payés ";

   /*  let moisTexte = '';
    if (moisInput) {
        const [annee, mois] = moisInput.split('-');
        const moisNoms = [
            'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
            'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
        ];
        moisTexte = `${moisNoms[parseInt(mois) - 1]} ${annee}`;
    }*/


    if (moisInput) titre += "du mois " + moisInput + " ";
    if (detenteurtext && detenteurtext !== "Selectionner Detenteur") titre += " - Détenteur : " + detenteurtext;
    if (denominationavancerech && denominationavancerech !== "Selectionner Denomination Maison") titre += " - Denomination : " + denominationavancerech;

    // 👉 Afficher le titre
    $('#titre-recherche-avance').text(titre).show();

    // 🔄 Met à jour la source AJAX du DataTable uniquement au clic sur "Valider"
    tablerechercheavance.ajax.url("{{ route('rechercheavance') }}" + 
        "?detenteur=" + detenteur +
        "&denomination=" + denomination +
        "&optionrechavance=" + optionrechavance +
        "&perioderechavance=" + perioderechavance
    ).load();


         });

         $('#rechercheForm').on('submit', function(e) {
        e.preventDefault();
      
        tablerecherche.ajax.reload(); // Recharge avec les filtres


        const idLocataire = $('#nomlocatairerech').val();

$.getJSON('/paiementloyer/totaux', {
    detenteur: $('#detenteurrech').val(),
    denomination: $('#denominationrech').val(),
    nomlocataire: $('#nomlocatairerech').val(),
    numappartement: $('#numappartementrech').val(),
    annee: $('#anneerech').val(),
    perioderech: $('#perioderech').val()
}, function(data){
console.log(data);
 // alert(data);
   if (data.totalReliquatvrai > 0) { 
    // Reliquat dû
    $('#totaux').html(
        `<b>Total versé :</b> ${data.totalVerse} FCFA <br>
         <b>Total reliquat :</b> <label style="color:red;font-weight:bold;">${data.totalReliquat} FCFA</label>`
    );
} else{

   $('#totaux').html(
        `<b>Total versé :</b> ${data.totalVerse} FCFA <br>
         <b>Total reliquat :</b> ${data.totalReliquat} FCFA`
    );

}

  //  Si un locataire est sélectionné, ajouter le bouton d’export
        if (idLocataire && idLocataire !== '') {

           $('#idlocataire').val(""+idLocataire);
           $('#idlocatairerecu').val(""+idLocataire);

          $('#exportBilanBtnContainer').html(`
                <button id="exportbilanBtn" class="btn btn-success mt-2" style='border-radius:6px;'>
                    <i class="fa fa-file-excel"></i>  <i class="fa fa-file-pdf"></i> Exporter Bilan Locataire
                </button> <button id="exportrecuBtn" class="btn btn-success mt-2" style='border-radius:6px;'>
                   <i class="fa fa-file-pdf"></i> Exporter Reçu Paiement
                </button> `);
          /*  $('#exportBilanBtnContainer').html(`
                <button id="exportExcelBtn" class="btn btn-success mt-2" style='border-radius:6px;'>
                    <i class="fa fa-file-excel"></i> Exporter Bilan Locataire XLS
                </button>
                <button id="exportPdfBtn" class="btn btn-danger mt-2" style='border-radius:6px;'>
            <i class="fa fa-file-pdf"></i> Exporter Bilan Locataire PDF
        </button>
            `);*/
$('#exportbilanBtn').on('click', function() {
              $('#exportBilanModal').modal('show');
 });

 $('#exportrecuBtn').on('click', function() {
              $('#exportrecuModal').modal('show');
 });
        
 /*     $('#exportExcelBtn').on('click', function() {
        //window.open('/paiementloyer/export-bilan-locataire/excel?idlocataire=' + idLocataire, '_blank');

         // Crée dynamiquement un formulaire POST
    const form = $('<form>', {
        method: 'POST',
        action: '/paiementloyer/export-bilan-locataire/excel',
        target: '_blank' // pour ouvrir le fichier dans un nouvel onglet
    });

    // Ajoute le token CSRF de Laravel
    form.append($('<input>', {
        type: 'hidden',
        name: '_token',
        value: $('meta[name="csrf-token"]').attr('content')
    }));

    // Ajoute l'ID du locataire
  form.append($('<input>', {
        type: 'hidden',
        name: 'idlocataire',
        value: idLocataire
    }));

    // Ajoute éventuellement d’autres filtres (plage de dates, etc.)
 
    // Ajoute le formulaire au DOM, le soumet, puis le supprime
    form.appendTo('body').submit().remove();
    });*/

    /*$('#exportPdfBtn').on('click', function() {
        window.open('/paiementloyer/export-bilan-locataire/pdf?idlocataire=' + idLocataire, '_blank');
    });*/
        } else {
          $('#exportBilanBtnContainer').html("Fichier");
            $('#exportBilanBtnContainer').empty(); // Enlever le bouton si pas de locataire
        }
});

  $('#rechercheModal').modal('hide');
    });



 
  });
   </script>

   <script>
 
    tablerechercheavance = $('#report-table-avance').DataTable({
    processing: true,
    serverSide: true,
    lengthMenu: [ [5,10, 25, 50, 100, -1], [5,10, 25, 50, 100, "Tous"] ],
    pageLength: 5,
    scrollX: false,   // désactive le scroll horizontal
    autoWidth: false, // empêche que DataTables ajoute des largeurs trop grandes
    responsive: true,
    ajax: {
            url: '{{ route("rechercheavance") }}',
           data: function (d) {
               /* d.detenteur= $('#detenteurrechava').val();
                d.denomination = $('#denominationrech').val();
                d.nomlocataire = $('#nomlocatairerech').val();
                d.numappartement = $('#numappartementrech').val();
                d.annee = $('#anneerech').val();
                d.perioderech=$('#perioderech').val();*/

                d.perioderechavance=$('#perioderechavance').val();
                d.optionrechavance=$('#optionrechavance').val();
                d.denominationavancerech=$('#denominationavancerech').val();
                d.detenteurrechavance=$('#detenteurrechavance').val();

                        console.log("Données envoyées au serveur :", d); // <- Ici !
            }
        },
         dom: 'Blfrtip',
           buttons: [
          {
     extend: 'colvis',
    text: '🛠️ Colonnes à afficher',
    titleAttr: 'Afficher ou masquer les colonnes',
    className: 'btn btn-outline-primary btn-sm rounded-pill shadow-sm px-3'

},
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> Exporter Excel',
            className: 'btn btn-success',
            title: 'Paiement Loyer'
        }
    ],
    columns: [
        { data: 'locataire_id', name: 'table_locataire.id' }, // ✅ préciser la table
        { data: 'detenteur', name: 'detenteur' },
        { data: 'denomination', name: 'm.denomination' },
        { data: 'numappartement', name: 'a.numappartement' },
        { data: 'nomlocataire', name: 'table_locataire.nom' },
        { data: 'montantloyer', name: 'a.montantloyer' },
        { data: 'montantmensuelverse', name: 'p.montantmensuelverse' },
        { data: 'modepaiement', name: 'p.modepaiement' },
        { data: 'moisenregloyer', name: 'p.moisenregloyer' },
        { data: 'relicatloyer', name: 'p.relicatloyer' },
        { data: 'daterengloyer', name: 'p.daterengloyer' },
        {
            data: null,
            render: function (data, type, row) {
                return `<button class="btn btn-sm btn-primary">Voir</button>`;
            }
        }
    ]
});
  </script>

    <script type="text/javascript">




  $('#denomination').change(function () {
            var id = $(this).val();


          $('#nomlocataire').empty().append('<option value="">Sélectionner Locataire</option>');


            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getoptionsloc/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                 


$.each(response, function(key, value) {
                        $('#nomlocataire').append('<option value="'+ value.id +'">'+ value.nom+' '+value.prenom+'</option>');
                    });


                    


                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });
            } else {
               // $('#email').val('');
            }
          }
          else{
            alert();
          }
        });
  
        $('#detenteurrech').change(function () {
            var id = $(this).val();


          $('#denominationrech').empty().append('<option value="" selected disabled >Selectionner Denomination Maison</option>');


            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getoptionsdenominpardetenteur/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                 


$.each(response, function(key, value) {
                        $('#denominationrech').append('<option value="'+ value.id +'">'+ value.denomination+'</option>');
                    });


                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });
            } else {
               // $('#email').val('');
            }
          }
          else{
            alert();
          }
        });


         $('#detenteurrechavance').change(function () {
            var id = $(this).val();


          $('#denominationavancerech').empty().append('<option value="" selected disabled >Tous</option>');


            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getoptionsdenominpardetenteur/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                 


$.each(response, function(key, value) {
                        $('#denominationavancerech').append('<option value="'+ value.id +'">'+ value.denomination+'</option>');
                    });


                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });
            } else {
               // $('#email').val('');
            }
          }
          else{
            alert();
          }
        });


    
        
        $('#detenteurform').change(function () {
            var id = $(this).val();


          $('#denomination').empty().append('<option value="" selected disabled >Sélectionner Denomination Maison</option>');


            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getoptionsdenominpardetenteur/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                 


$.each(response, function(key, value) {
                        $('#denomination').append('<option value="'+ value.id +'">'+ value.denomination+'</option>');
                    });


                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });
            } else {
               // $('#email').val('');
            }
          }
          else{
            alert();
          }
        });




   $('#denominationrech').change(function () {
            var id = $(this).val();


          $('#nomlocatairerech').empty().append('<option value="" selected disabled >Sélectionner Locataire</option>');


            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getoptionsloc/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                 


$.each(response, function(key, value) {
                        $('#nomlocatairerech').append('<option value="'+ value.id +'">'+ value.nom+' '+value.prenom+'</option>');
                    });


                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });
            } else {
               // $('#email').val('');
            }
          }
          else{
            alert();
          }
        });



         $('#nomlocataire').change(function () {
            var idtableloc = $(this).val();

            var iddenomin=$('#denomination').val();


$('#numappartement').empty().append('<option value="">Sélectionner Numero Appartement</option>');




         if(idtableloc!=""){
           //   alert(id);
            if (idtableloc) {
                $.ajax({
                    url: '/getoptionsnumappart/' + iddenomin+'/'+idtableloc,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                       
let totalVerse = 0;
$.each(response, function(key, value) {
 totalVerse += parseFloat(value.montant_total || 0);
                        $('#numappartement').append('<option value="'+ value.numappartement +'">Num_Appart_'+ value.numappartement+'</option>');
                    });

                     
                if (totalVerse === 0) {
                /*    Swal.fire({
                        icon: 'info',
                        title: 'Aucun versement',
                        text: 'Ce locataire n’a effectué aucun versement pour ses appartements.',
                    });*/

                     $('#versementmensueldiv').slideDown();

                }

                else{
                     /* Swal.fire({
                        icon: 'info',
                        title: 'versement',
                        text: 'Ce locataire a effectué versement pour ses appartements.',
                    });*/
                    $('#periodeversement').val('');
 $('#versementmensueldiv').hide();
                }


                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });
            } else {
               // $('#email').val('');
            }
          }
          else{
            alert();
          }
        });


 $('#nomlocatairerech').change(function () {
            var idtableloc = $(this).val();

            var iddenomin=$('#denominationrech').val();


$('#numappartementrech').empty().append('<option value="">Sélectionner Numero Appartement</option>');




         if(idtableloc!=""){
           //   alert(id);
            if (idtableloc) {
                $.ajax({
                    url: '/getoptionsnumappart/' + iddenomin+'/'+idtableloc,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                       

$.each(response, function(key, value) {
                        $('#numappartementrech').append('<option value="'+ value.numappartement +'">Num_Appart_'+ value.numappartement+'</option>');
                    });


                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });
            } else {
               // $('#email').val('');
            }
          }
          else{
            alert();
          }
        });



$(document).ready(function() {
    $('#checkAll').on('change', function() {
        const checked = $(this).is(':checked');
        $('input[name="mois[]"]').prop('checked', checked);
    });

    // Synchroniser l'état du bouton "Tout cocher" si l'utilisateur coche/décoche manuellement
    $('input[name="mois[]"]').on('change', function() {
        const total = $('input[name="mois[]"]').length;
        const cochés = $('input[name="mois[]"]:checked').length;
        $('#checkAll').prop('checked', total === cochés);
    });
});




       $('#deteteursForm').submit(function(e) {
            e.preventDefault();
 

        var moisCoches = $('input[name="mois[]"]:checked').map(function() {
          return this.value;
                         }).get();

// if(moisCoches !=""){


  var nom=$("#nom").val();

  if ($('#versementmensueldiv').is(':visible') && !$('#periodeversement').val()) {
    Swal.fire({
        title: '⚠️ Champ requis',
        text: 'Sélectionner le mois début versement.',
        icon: 'warning',
        confirmButtonText: 'OK',
        customClass: {
            confirmButton: 'btn btn-primary px-4 py-2'
        }
    });
    return; // Stop l'envoi
}

  //alert(nom);

$.ajax({
    url: "/paiementloyeri/verifier",
    type: "POST",
    data: $("#deteteursForm").serialize(),
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // très important en Laravel
        },
    success: function(response) {
        if(response.success === "preview") {

          let table = `
                <table style="width:100%; border-collapse: collapse; font-size:14px;">
                    <thead>
                        <tr style="background-color:#f0f0f0; text-align:left;">
                            <th style="padding:8px; border:1px solid #ccc;">Mois</th>
                            <th style="padding:8px; border:1px solid #ccc;">Versé (FCFA)</th>
                            <th style="padding:8px; border:1px solid #ccc;">Relicat (FCFA)</th>
                        </tr>
                    </thead>
                    <tbody>
            `;


            let details = "";
            response.mois.forEach(m => {
                details += `<li>${m.mois} → Versé: ${m.verse} FCFA (Relicat: ${m.relicat} FCFA)</li>`;

                    table += `
                    <tr>
                        <td style="padding:8px; border:1px solid #ccc;">${m.mois}</td>
                        <td style="padding:8px; border:1px solid #ccc;">${m.verse}</td>
                        <td style="padding:8px; border:1px solid #ccc;">${m.relicat}</td>
                    </tr>
                `;
            });

            table += `</tbody></table>`;

            $('.modal').css('z-index', '1050');

            Swal.fire({
                title:  `<span class="fw-bold text-dark"><h4>${response.message}</h4></span>`,
                
                //html: `<ul style="text-align:left;font-weight: bold;font-size: 100%;color: red;">${details}</ul>`,
                html: `<div style="font-weight: bold;color: red;">${table}</div>`,
                icon: "info",
                 customClass: {
    icon: 'swal-icon-small'
  },
   // pour mettre "Annuler" à gauche
                 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      },
     iconColor: "#0d6efd",
      draggable: true,
  background: "#0d6efd",
  showCancelButton: true,
  confirmButtonText: '<i class="fa fa-check me-1"></i> Confirmer',
  cancelButtonText: '<i class="fa fa-times me-1"></i> Annuler',
  confirmButtonColor: "#198754",
  cancelButtonColor: "#6c757d",
  buttonsStyling: false,
  customClass: {
    popup: 'swal2-rounded border shadow-sm p-3',
    confirmButton: 'btn btn-success px-4 py-2 me-2',
    cancelButton: 'btn btn-danger px-4 py-2',
    title: 'fw-bold',
    htmlContainer: 'mt-2'
  },
  reverseButtons: true,
 footer: '<a href="#">Verification avant Validation</a>'
  // 🌫 Animation douce & élégante (discrète)

            }).then((result) => {
                if (result.isConfirmed) {
                 var url = '/paiementloyeri';
    var method = 'POST';
    var formData = $("#deteteursForm").serialize();

    $.ajax({
        type: method,
        url: url,
        data: formData,

  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // très important en Laravel
        },
        
        success: function(response) {

          if (response.success) {
           // alert(response.success+" "+response.message);
           // console.log(response);
    $('#report-table').DataTable().ajax.reload();

     $('#deteteursForm')[0].reset(); 

  $('.modal').css('z-index', '1050');


           Swal.fire({title: '<span class="fw-bold text-dark"><h4>Infos</h4></span>',
  text: response.message,
  icon: 'info',
     showCancelButton: true,
    confirmButtonText: '<i class="fa fa-file-pdf"></i> Oui, afficher le reçu',
    cancelButtonText: '<i class="fa fa-times"></i> Non, plus tard',
    buttonsStyling: false,
    customClass: {
        popup: 'swal2-rounded swal2-shadow',
        confirmButton: 'btn btn-success px-4 py-2 me-2',
        cancelButton: 'btn btn-secondary px-4 py-2',
        title: 'text-success fw-bold',
        htmlContainer: 'text-muted'
    },
    background: '#f9f9f9',
    reverseButtons: true,
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    }).then((result) => {

    if (result.isConfirmed) {
        if (response.recu_url) {
          
            window.open(response.recu_url, '_blank');

        } else {
            Swal.fire({
                icon: 'warning',
                title: '⚠️ Reçu introuvable',
                text: 'Aucun reçu disponible pour ce paiement.',
                confirmButtonText: 'OK',
                confirmButtonColor: '#6c757d'
            });
        }
    }
});




        // Check if receipt URL exists
     /*   if (response.recu_url) {
            window.open(response.recu_url, '_blank'); // Open PDF in new tab
        }*/

                   if(url !='/updatelocataire/' + id){

                       $('#deteteursForm')[0].reset(); // Réinitialiser le formulaire

                   }
                   else{
                      $('#deteteursForm')[0].reset(); // Réinitialiser le formulaire

                    $('#exampleModal').modal('hide'); // Hide the modal

                   }
          }
          else{


          }
        },
        error: function(xhr) {
            console.error('Erreur AJAX', xhr.responseText);
        }

         });
                }
            });
        }
    }
    ,
    error: function(xhr) {
        if(xhr.status === 422) {
            let errors = xhr.responseJSON.errors;
            let errorMessages = "";

            // Parcourir toutes les erreurs et créer une liste
            Object.keys(errors).forEach(function(key) {
                errorMessages += `<li>${errors[key][0]}</li>`;
            });

            // Afficher avec Swal
            Swal.fire({
                title: '⚠️ Erreur de validation',
                html: `<ul style="text-align:left; color:red;">${errorMessages}</ul>`,
                icon: 'error',
                confirmButtonText: 'OK',
                background: '#f8f9fa',
                customClass: {
                    confirmButton: 'btn btn-danger px-4 py-2'
                }
            });
        } else {
            // Autres erreurs
            Swal.fire({
                title: 'Erreur',
                text: 'Une erreur est survenue, veuillez réessayer.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }
});







          });



$('body').on('click', '.deleteappartement', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = '/suppapppartement/' + id;
        var numappartement=$(this).data('numappart');



       Swal.fire({
  title: 'Voulez vous vraiment supprimer l\'appartement Numero_<<'+numappartement+'>>?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Oui",
  denyButtonText: "Non",
  cancelButtonText: "Annuler"
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {


            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable
                    //alert();

                    Swal.fire('Enregistrement Supprimé avec succès!', "", "success");
                },
                error: function(error) {
                    console.log(error);
                   // alert('An error occurred.');
 Swal.fire('An error occurred!', "", "error");
                }
            });
    
  } else if (result.isDenied) {
    Swal.fire("Aucune Modification effectuée!!", "", "info");
  }
});

        
      // alert(name);
    });


        $('body').on('click', '.deletepaiementmensuel', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = '/suppapppartement/' + id;
        var numappartement=$(this).data('numappart');
        var nomlocataire=$(this).data('locataire');
        var mois=$(this).data('mois');
        var paie=$(this).data('paie');



       Swal.fire({
  title: 'Voulez vous vraiment supprimer cet Enregistrement qui stipule que '+nomlocataire+' a reglé le Loyer avec le montant de '+paie+' Pour le Mois de '+mois+' ?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Oui",
  denyButtonText: "Non",
  cancelButtonText: "Annuler"
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {


           var url='/suppaiementloyer/'+id;

           $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable
                    //alert();

                    Swal.fire('Enregistrement Supprimé avec succès!', "", "success");
                },
                error: function(error) {
                    console.log(error);
                   // alert('An error occurred.');
 Swal.fire('An error occurred!', "", "error");
                }
            });
    
  } else if (result.isDenied) {
    Swal.fire("Aucune Modification effectuée!!", "", "info");
  }
});

        
      // alert(name);
    });

         $('body').on('click', '.rollbackappartement', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = '/rollbackappartement/' + id;
  var numappartement=$(this).data('numappart');

       Swal.fire({
  title: 'Voulez vous vraiment Retablir l\'appartement Numero_<<'+numappartement+'>>?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Oui",
  denyButtonText: "Non",
  cancelButtonText: "Annuler"
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {



            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    

                    if (response.success) {
                   // alert(response.success);

                    Swal.fire(response.success, "", "success");
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable

                  }


                },
                error: function(error) {
                    console.log(error);
                   // alert('An error occurred.');

                     Swal.fire('An error occurred!', "", "error");
                }
            });


         
    
  } else if (result.isDenied) {
    Swal.fire("Aucune Modification effectuée!!", "", "success");
  }
});

      //  if (confirm('Voulez vous vraiment Retablir Cet enregistrement <<'+name.toUpperCase()+'>>?')) {




     //   }
      // alert(name);
    });

               $('body').on('click', '.editlocataire', function () {
        var id = $(this).data('id');
        
 




    });




                $("#showdialog").on('click',function(){


            $('#denomination').prop("disabled",false);
            $('#titlemaison').html('Paiement Loyer'); 
           $("#idlib").val("");
            $('#denomination').val("");
            
              $('#detenteurform').prop('selectedIndex', 0); //  remet le menu à "Sélectionner Détenteur"

              $('#nomlocataire').prop('selectedIndex', 0); //  remet le menu à "Sélectionner Détenteur"
              $('#numappart').val("");
            $('#numappartdisa').val("");
             $("#numappartdisa").prop("disabled", true);
              $('#denomination').prop("readonly",false);

              $('input[name="mois[]"]').prop('checked', false);
              $('#checkAll').prop('checked', false);

              $("#nom").val("");
              $("#montantloyer").val("");
              $("#montantmensverse").val("");
            $('#exampleModal').modal('show');




      });



                $("#recherchedialog").on('click',function(){


            $('#denomination').prop("disabled",false);
            $('#titlemaison').html('Recherche'); 
        
              $('#detenteurrech').prop('selectedIndex', 0); // ✅ remet le menu à "Sélectionner Détenteur"
                $('#denominationrech').prop('selectedIndex', 0);
                $('#nomlocatairerech').prop('selectedIndex', 0);
           /* $('#denomination').val("");
            $('#numappart').val("");
            $('#numappartdisa').val("");
             $("#numappartdisa").prop("disabled", true);
              $('#denomination').prop("readonly",false);

              $('input[name="mois[]"]').prop('checked', false);
              $('#checkAll').prop('checked', false);

              $("#nom").val("");
              $("#montantloyer").val("");
              $("#montantmensverse").val("");*/
            $('#rechercheModal').modal('show');



      });


       $("#rechercheavancedialog").on('click',function(){


            $('#denomination').prop("disabled",false);
            $('#titlemaison').html('Recherche Avancée'); 
        
              $('#detenteurrechavance').prop('selectedIndex', 0); // ✅ remet le menu à "Sélectionner Détenteur"
              $('#optionrechavance').prop('selectedIndex', 0);
            
            $('#rechercheModalavances').modal('show');



      });

     

    </script>

    <script>
    
         $("#detailsappartement").on('click',function(e){

        e.preventDefault();

        var denomination=$("#denomination").val();
        var numappartement=$("#numappartement").val();

        if(denomination !=""){

  if(numappartement !=""){

//alert(numappartement+" "+denomination);


var url = '/getdetails/' + denomination+'/'+numappartement;

 $.ajax({
                type: "GET",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    

                    //if (response.success) {
                   // alert(response.success);

                    //Swal.fire(response, "", "success");

                  $("#detenteur").html(response.detenteur);
                  $("#numeroappart").html(response.numappart);
                    $("#typeappart").html(response.typeappart);
                    $("#localisation").html(response.commune);

                  $("#nomappartemnent").html(response.maison);
                  $("#exampleModaldetails").modal('show');

                 // }


                },
                error: function(error) {
                    console.log(error);
                   // alert('An error occurred.');
                    $('.modal').css('z-index', '1050');

                  //Swal.fire('An error occurred!', "", "error");

                      Swal.fire({title: 'Infos',
  text: error,
  icon: 'error',
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    });



                }
            });
          
        }
        else{

                $('.modal').css('z-index', '1050');


           Swal.fire({title: 'Infos',
  text: 'Veuillez Selectionner le Numero Appartement',
  icon: 'error',
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    });

           
        }

        }
        else{

          $('.modal').css('z-index', '1050');


           Swal.fire({title: 'Infos',
  text: 'Veuillez Selectionner Denomination Maison',
  icon: 'error',
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    });
        }

        


      });
    
    </script>

    <!-- [Page Specific JS] end -->
      





<!-- [ thememode ] start -->
  @include('thememode.thememode')
<!-- [ thememode ] end -->
   

  </body>
  <!-- [Body] end -->
</html>
