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
    /*text-align: center;*/
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

/*.custom-swal {
  z-index: 1060 !important;
}*/


.custom-swal {
  z-index: 1050 !important;
}

.modal {
 z-index: 1055 !important;; /* Valeur par défaut de Bootstrap */
}


.modal-backdrop {
  z-index: 1050;
}
#locataire{

  color:#2ca87f !important;
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

         <!-- @include('banner.barnerbleu') -->
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                  <li class="breadcrumb-item" aria-current="page">Travaux</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Travaux</h2>
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
                <h5>Travaux</h5>
                <div class="card-header-right">
                  <!--data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                  <button type="button"  class="btn btn-primary" id="showdialog" style="/*margin-top: 6px !important;background: #e58a00;
  color: #fff;
  border-color: #e58a00;margin-right: 22px !important;*/"> <i class="fas fa-plus"></i>
                    Nouveau 
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
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titlemaison">Locataire</span></h5
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
                          
                          <!--<select class="form-select" name="denomination" id="denomination" style='margin-top:10px;' required>
                                <option value="">Sélectionner Denomination Maison</option>
                              @if(isset($denominationmaison) && $denominationmaison->count() > 0)
                                @foreach($denominationmaison as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->denomination)) }}</option>
                                @endforeach
                              @endif
                            </select>-->
                            <select class="form-select" name="denomination" id="denomination" style='margin-top:10px;' required>
                               
                              
                            </select>

                            </div>

                              <div class="mb-3">
                              <label class="form-label" for="locatairesec" >Locataire</label>
                          
                          <!--<select class="form-select" name="denomination" id="denomination" style='margin-top:10px;' required>
                                <option value="">Sélectionner Denomination Maison</option>
                              @if(isset($denominationmaison) && $denominationmaison->count() > 0)
                                @foreach($denominationmaison as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->denomination)) }}</option>
                                @endforeach
                              @endif
                            </select>-->
                            <select class="form-select" name="locatairesec" id="locatairesec" style='margin-top:10px;' required>
                               
                              
                            </select>

                            </div>
   <div class="mb-3">
                            <label for="detenteur" class="form-label">Numero Appartement</label>
                           <div style="display:flex;">  
                     <select class="form-select" name="numappartement" id="numappartement" required>
                                <option value="">Sélectionner Numero Appartement</option>
                              
                          
                            </select><button class="btn btn-light-info" style="margin-left:12px;border-radius: 9px !important; background: #3ec9d6 !important;color: #fff !important;border-color: #3ec9d6 !important;" id="detailsappartement" >Details</button>
                          </div>
                        </div> 

                           <div class="mb-3">
                            <label for="typelocation" class="form-label">Locataire</label>
                           <input type="text" class="form-control" name="locataire" id="locataire" value="" placeholder="Locataire" style="color:#2ca87f !important;" readonly />

                        </div> 

                                      <div class="mb-3">
              <label class="form-label" for="fname" >Intitulé Travaux</label>
              <textarea class="form-control" cols="2" rows="4" name="intituletravaux"  id="intituletravaux"></textarea>

            </div>

                                 <div class="mb-3">
                            <label for="typelocation" class="form-label">Montant Requis</label>
                           <input type="text" class="form-control" name="montantrequis" id="montantrequis" value="" placeholder="Saisissez le Montant" required />

                        </div> 

                           <div class="mb-3">
                            <label for="typelocation" class="form-label">Date Enregistrement</label>
                           <input type="date" class="form-control" name="dateentree" id="dateentree" value="" style="padding: 0.6em 0.75rem !important;" placeholder="Selectionner Date Entree" required />

                        </div> 

                         <div class="mb-3">
                            <label for="typelocation" class="form-label">Date Resolution</label>
                           <input type="date" class="form-control" name="datesortie" id="datesortie" value="" style="padding: 0.6em 0.75rem !important;" placeholder="Selectionner Date Sortie"  />

                        </div> 

                 <div style="display:none;">                           
    <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" value="" placeholder="Saisissez le nom"  />
                               
                        </div>

                            <div class="mb-3">
                            <label for="typelocation" class="form-label">Prenom</label>
                           <input type="text" class="form-control" name="prenom" id="prenom" value="" placeholder="Saisissez le prenom"  />

                        </div> 
                         <label for="phone" class="form-label">Telephone</label>
                            <div class="mb-3">
                            
                                 <input
                                type="tel"
                                class="form-control"
                                id="phone"
                                name="phone"
                                
                              />
                                     <input
                                type="hidden"
                                class="form-control"
                                id="phone_full1"
                                name="phone_full1"
                                value=""
                                
                              />
                                      <input
                                type="hidden"
                                class="form-control"
                                id="country_code1"
                                name="country_code1" 
                                value=""
                                
                              />
                            </div>
                             <label for="phone2" class="form-label">Telephone 2</label>
                            <div class="mb-3">
                            
                                 <input
                                type="tel"
                                class="form-control"
                                id="phone2"
                                name="phone2"
                                
                              />
                                      <input
                                type="hidden"
                                class="form-control"
                                id="phone_full2"
                                name="phone_full2"
                                value=""
                                
                              />
                                      <input
                                type="hidden"
                                class="form-control"
                                id="country_code2"
                                name="country_code2" 
                                value=""
                                
                              />
                            </div>
                            <div class="mb-3">
              <label class="form-label" for="nbmremoiscaution" >Adresse Mail</label>
                         <input type="email" name="email" id="email" class="form-control error" data-bouncer-message="The domain portion of the email address is invalid (the portion after the @)."  aria-describedby="bouncer-error_email" aria-invalid="true">
                            </div>
                             <div class="mb-3">
                            <label for="typelocation" class="form-label">Profession</label>
                           <input type="text" class="form-control" name="poste" id="poste" value="" placeholder="Saisissez le Poste"  />

                        </div> 

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
                <div class="">
                  <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Id</th>
                        <th class="border-top-0" style="text-transform: none !important;">Detenteur</th>
                        <th class="border-top-0" style="text-transform: none !important;">Denomination Maison</th>
                        <th class="border-top-0" style="text-transform: none !important;">Num Appart</th>
                        <th class="border-top-0" style="text-transform: none !important;">Locataire</th>
                        <th class="border-top-0" style="text-transform: none !important;">Intitule Travaux</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Date Enreg</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Montant</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Date Resolution</th>
                        <!--<th class="border-top-0" style="text-align:center;text-transform: none !important;">Description</th> -->
                        <th class="border-top-0" style="/*text-align:center;*/text-transform: none !important;">Etat</th>
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
   document.getElementById("montantrequis").addEventListener("input", function (e) {
       this.value = this.value.replace(/[^0-9]/g, ""); // Allow only digits
   });
      /*document.getElementById("nbmremoiscaution").addEventListener("input", function (e) {
       this.value = this.value.replace(/[^0-9]/g, ""); // Allow only digits
   });*/


      $('#montantrequis').divide({

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

    document.addEventListener("DOMContentLoaded", function () {



  $('#report-table').DataTable({
      lengthMenu:[5,10,15,20,25],
      pageLength: 5,
      processing: true,
    serverSide: true,
    scrollX: false,   // désactive le scroll horizontal
    autoWidth: false, // empêche que DataTables ajoute des largeurs trop grandes
    responsive: true,
     
        ajax: '{{ route("affichertravaux") }}', // Fetch data via AJAX
         dom: 'Bfrtip', // Ajout des boutons d'exportation
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
            title: 'Travaux'
        }
    ],
    //'iddenomination','numappartement','nom','prenom','numero1','numero2','adresseemail','occupation','montantcaution','dateentree','datesortie','reliquatcaution'
        columns: [
         {data: 'id', name: 'id'}, 
         {data: 'detenteur', name: 'detenteur'},
            {data: 'denomination', name: 'denomination'}, // Famille name
            {data: 'numappart', name: 'numappart'}, 
            {data: 'locataire', name: 'locataire'},
            {data: 'intituletravaux', name: 'intituletravaux'},
            {data: 'datenreg', name: 'datenreg'},
            {data: 'montant', name: 'montant'},
            {data: 'date', name: 'date'},
            {data: 'etat', name: 'etat'},
            //{data: 'description', name: 'description'},
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

 
  });
   </script>

    <script type="text/javascript">

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

      $('#denomination').change(function () {
            var id = $(this).val();


$('#numappartement').empty().append('<option value="">Sélectionner Numero Appartement</option>');
$("#locatairesec").empty().append('<option value="">Sélectionner Locataire</option>');


            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getoptionstravaux/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                     /*  $("#numappart").val(response);

                       $("#numappartdisa").val(response);*/

/*
$.each(response, function(key, value) {
                        $('#numappartement').append('<option value="'+ value.numappartement +'">Numero_'+ value.numappartement +'</option>');
                    });*/

                    // Vider le select avant d'ajouter
     

        $.each(response.appartements, function (key, value) {
            $('#numappartement').append(
                '<option value="'+ value.numappartement +'">Numero_' + value.numappartement + '</option>'
            );
        });

        $.each(response.locataires, function (key, value) {
    $('#locatairesec').append(
        '<option value="'+ value.id +'">'+ value.nom+" "+value.prenom +'</option>'
    );
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


         $('#locatairesec').change(function () {
            var id = $(this).val();


$('#numappartement').empty().append('<option value="">Sélectionner Numero Appartement</option>');



            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getoptionslocatairenumappart/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                     /*  $("#numappart").val(response);

                       $("#numappartdisa").val(response);*/

/*
$.each(response, function(key, value) {
                        $('#numappartement').append('<option value="'+ value.numappartement +'">Numero_'+ value.numappartement +'</option>');
                    });*/

                    // Vider le select avant d'ajouter
     

        $.each(response.appartements, function (key, value) {
            $('#numappartement').append(
                '<option value="'+ value.numappartement +'">Numero_' + value.numappartement + '</option>'
            );
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

       $('#deteteursForm').submit(function(e) {
            e.preventDefault();
 


           var id = $('#idlib').val();
            var url = (id) ? '/updatetravaux/' + id : '/travauxi/';
            var message = (id) ? 'Mise à jour Effectuée avec Succès !': 'Insertion effectuée avec Succès !';
            var method = (id) ? 'POST' : 'POST';
            var formData = $(this).serialize();

         $.ajax({
                type: method,
                url: url,
                data: formData,
                success: function(response) {


                  //alert(response);
                 
if (response.success) {

  //alert(response.message); // Afficher un message de succès

             // Swal.fire(response.message, "", "success");


                  $('.modal').css('z-index', '1050');


           Swal.fire({title: 'Infos',
  text: response.message,
  icon: 'info',
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    });


    $('#report-table').DataTable().ajax.reload();
                   if(url !='/updatetravaux/' + id){

                       $('#deteteursForm')[0].reset(); // Réinitialiser le formulaire

                   }
                   else{
                      $('#deteteursForm')[0].reset(); // Réinitialiser le formulaire

                    $('#exampleModal').modal('hide'); // Hide the modal

                   }
                  
                 
                 
                }


                },
                error: function(error) {
                    console.log(error);
                   // alert('An error occurred.');

                     if (error.status === 422) { // Erreur de validation
                    let errors = error.responseJSON.errors;
                    //if (errors.libelledetenteurs) {
                        //$('#error-libelledetenteurs').text(errors.libelledetenteurs[0]); // Afficher l'erreur sous l'input

                        let errorMessage = "Erreur de validation :\n";
            
            $.each(errors, function(key, value) {
                errorMessage += "- " + value[0] + "\n"; // Concatène toutes les erreurs
            });

            alert(errorMessage);

            ///Swal.fire(errorMessage, "", "error");
                    //}
                }
                else{
                    // alert("error status "+error.status);

                   //Swal.fire(error.status, "", "error");

                  $('.modal').css('z-index', '1050');


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


    $("body").on("click", ".deletetravaux", function (e) {
        e.preventDefault();
        
        var id = $(this).data('id');
         var travaux = $(this).data('travaux');
         var numappart=$(this).data('numappart');
        var url='/supprimetravaux/'+id;
         

        //  alert(travaux);

         var datetrav=$(this).data('datetrav');

               Swal.fire({
  title: 'Voulez vous vraiment supprimer les travaux intitulés : '+travaux+'  de l\'appartement Num_'+numappart+' à la date du '+datetrav+'?',
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

                  if(response.success=="success"){
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable
                    //alert();

                    Swal.fire('Enregistrement Supprimé avec succès!', "", "success");
                  }
                  else{
                    Swal.fire(response.success, "", "error");
                  }
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
      


    });
               $('body').on('click', '.edittravaux', function () {
        var id = $(this).data('id');
        
 var id = $(this).data('id');

 var idmaison  = $(this).data('maison');


 
       $.get('/gettravauxpar/' + id+"/"+idmaison, function (data) {
            // Populate the modal form with the fetched data
           // alert(data.libelefamille);
        $("#idlib").val(id);
            $('#titlemaison').html('Modifier Travaux'); 
            $('#denomination').val(data.travaux.idmaison);
            //$('#numappartement').val(data.numappartement);

           // alert(data.numappartement);
        var idappart=data.travaux.numappart;
        var iddetenteur=data.travaux.iddetenteur;
        var idmaison=data.travaux.idmaison;
        let selectOptionsappart = '<option value="">Sélectionner Denomination</option>';

               /* selectOptionsappart = `<option value="${data.travaux.idmaison}" selected="selected" >Numero_${detent.libelledetenteurs}</option>`;
  $('#denomination').val(selectOptionsappart);*/

      data.maison.forEach(function(maison) {
       if(maison.id==idmaison){
        selectOptionsappart += `<option value="${maison.id}" selected="selected" >${maison.denomination}</option>`;
       }
       else{
                selectOptionsappart += `<option value="${maison.id}">${maison.denomination}</option>`;

       }
    });

      $('#denomination').html(selectOptionsappart);

            let selectOptionsdetenteur = '<option value="">Sélectionner Detenteur</option>';
    data.detenteurs.forEach(function(detent) {
       if(detent.id==iddetenteur){
        selectOptionsdetenteur += `<option value="${detent.id}" selected="selected" >${detent.libelledetenteurs}</option>`;
       }
       else{
                selectOptionsdetenteur += `<option value="${detent.id}">${detent.libelledetenteurs}</option>`;

       }
    });
    $('#detenteurform').html(selectOptionsdetenteur);

     $("#intituletravaux").html("");

// alert(data.travaux.intituletravaux);

            // Remplir le select avec les appartements disponibles
    let selectOptions = '<option value="">Sélectionner Numero Appartement</option>';
    data.appartements.forEach(function(appart) {
       if(appart.numappartement==idappart){
        selectOptions += `<option value="${appart.numappartement}" selected="selected" >Numero_${appart.numappartement}</option>`;
       }
       else{
                selectOptions += `<option value="${appart.numappartement}">Numero_${appart.numappartement}</option>`;

       }
    });
    $('#numappartement').html(selectOptions);

 $("#locataire").val(data.idenlocataire.nom+" "+data.idenlocataire.prenom);


  /*alert(data.idenlocataire.nom);*/
  


    $("#intituletravaux").html(""+data.travaux.intituletravaux);
 
$("#montantrequis").val(data.travaux.montant);

$("#dateentree").val(data.travaux.datenreg);
$("#datesortie").val(data.travaux.date);

    
    /* $('#nom').val(data.locataire.nom);
      $('#prenom').val(data.locataire.prenom);
      // $('#phone').val(data.locataire.numero1);












        $("#email").val(data.locataire.adresseemail);
        $("#poste").val(data.locataire.occupation);
        $("#montantcaution").val(data.locataire.montantcaution);
         $("#dateentree").val(data.locataire.dateentree);
         $("#datesortie").val(data.locataire.datesortie);*/
             /*   $("#numappartdisa").prop("disabled", true);
           
            $("#typelocation").val(data.typelocation);
            $("#montantlocation").val(data.montantloyer);
            $("#nbmremoiscaution").val(data.nbremoiscaution);
            $('#denomination').prop("disabled",true);*/

           /* $('#denomination').prop("readonly",true);
            $('#detenteur').val(data.detenteur);
            $('#typeimmobilier').val(data.typeimmo);
             $('#ville').val(data.ville);
             $('#commune').val(data.commune);
             $('#quartier').val(data.quartier);
             $('#adresse').val(data.adresse);
             $('#description').val(data.description);*/
            $('#exampleModal').modal('show');
        });


    });


$("#phone").on('keyup',function(){

/*const input = document.querySelector("#phone");
const iti = window.intlTelInput(input, {
  separateDialCode: true,

  hiddenInput: () => ({ phone: "phone_full1", country: "country_code1" }),
});*/

 const phoneNumber = iti.getNumber(); // Numéro complet avec indicatif
 const countryCode = iti.getSelectedCountryData().dialCode;
//alert(phoneNumber);
 var contact1=phoneNumber;

$("#phone_full1").val(contact1);
});

$("#phone2").on('keyup',function(){

/*const input = document.querySelector("#phone");
const iti = window.intlTelInput(input, {
  separateDialCode: true,

  hiddenInput: () => ({ phone: "phone_full1", country: "country_code1" }),
});*/

 const phoneNumber = iti2.getNumber(); // Numéro complet avec indicatif
 const countryCode = iti2.getSelectedCountryData().dialCode;
//alert(phoneNumber);
 var contact2=phoneNumber;

$("#phone_full2").val(contact2);
});

                $("#showdialog").on('click',function(){

           $("#intituletravaux").html("");
            $('#denomination').prop("disabled",false);
          
            $('#titlemaison').html('Travaux'); 
           $("#idlib").val("");
            $('#denomination').val("");
            $('#locataire').val("");
            $("#montantrequis").val("");
            $("#dateentree").val("");
            $("#datesortie").val("");
            $('#numappart').val("");
            $('#numappartdisa').val("");
             $("#numappartdisa").prop("disabled", true);
              $('#denomination').prop("readonly",false);
             $('#detenteurform').prop('selectedIndex', 0);
             $('#denomination').prop('selectedIndex', 0);
            $('#numappartement').prop('selectedIndex', 0);
            $('#exampleModal').modal('show');



      });


                      const input = document.querySelector("#phone");
      const iti = window.intlTelInput(input, {
         separateDialCode: true, // Montre le code pays séparé
         nationalMode: false,
        // allowDropdown: false,
        // autoPlaceholder: "off",
        // containerClass: "test",
        // countryOrder: ["jp", "kr"],
        // countrySearch: false,
        // customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
        //   return "e.g. " + selectedCountryPlaceholder;
        // },
        // dropdownContainer: document.querySelector('#custom-container'),
        // excludeCountries: ["us"],
        // fixDropdownWidth: false,
        // formatAsYouType: false,
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   fetch("https://ipapi.co/json")
        //     .then(function(res) { return res.json(); })
        //     .then(function(data) { callback(data.country_code); })
        //     .catch(function() { callback(); });
        // },
        hiddenInput: () => ({ phone: "phone_full1", country: "country_code1" }),
        // i18n: { 'de': 'Deutschland' },
        initialCountry: "ci",
        // loadUtils: () => import("/build/js/utils.js"), // leading slash (and http-server) required for this to work in chrome
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // showFlags: false,
        // separateDialCode: true,
        // strictMode: true,
        // useFullscreenPopup: true,
        // validationNumberTypes: null,
      });

      input.addEventListener("countrychange", function() {

    // do something with iti.getSelectedCountryData()

        var info=iti.getNumber();

        alert(info);

  });


        const input2 = document.querySelector("#phone2");
      const iti2 = window.intlTelInput(input2, {
         separateDialCode: true, // Montre le code pays séparé
         nationalMode: false,
        // allowDropdown: false,
        // autoPlaceholder: "off",
        // containerClass: "test",
        // countryOrder: ["jp", "kr"],
        // countrySearch: false,
        // customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
        //   return "e.g. " + selectedCountryPlaceholder;
        // },
        // dropdownContainer: document.querySelector('#custom-container'),
        // excludeCountries: ["us"],
        // fixDropdownWidth: false,
        // formatAsYouType: false,
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   fetch("https://ipapi.co/json")
        //     .then(function(res) { return res.json(); })
        //     .then(function(data) { callback(data.country_code); })
        //     .catch(function() { callback(); });
        // },
         hiddenInput: () => ({ phone: "phone_full2", country: "country_code2" }),
        // i18n: { 'de': 'Deutschland' },
        initialCountry: "ci",
        // loadUtils: () => import("/build/js/utils.js"), // leading slash (and http-server) required for this to work in chrome
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // showFlags: false,
        // separateDialCode: true,
        // strictMode: true,
        // useFullscreenPopup: true,
        // validationNumberTypes: null,
      });


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
/*$('.modal').css('z-index', '1050');


           Swal.fire({title: 'Infos',
  text: response.maison,
  icon: 'info',
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    });
*/
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

$("#numappartement").on('change',function(){


var numappartement=$(this).val();
var denomination=$("#denomination").val();


var url = '/getLocataire/' + denomination+'/'+numappartement;



    $.ajax({
                    url:url,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response.etat);

                       if(response.etat==='Libre'){

                         $("#locataire").val("Appartement Libre");

                       }
                       else{

                         $("#locataire").val(""+  response.message.nom.toUpperCase()+" "+response.message.prenom.toUpperCase());
                       }

                     /*  $("#numappart").val(response);

                       $("#numappartdisa").val(response);*/

                    



                    },
                     error: function(error) {
                    console.log(error);

                    //alert(error);

                  }
                });



});
     

    </script>

    <!-- [Page Specific JS] end -->
      





<!-- [ thememode ] start -->
  @include('thememode.thememode')
<!-- [ thememode ] end -->
   

  </body>
  <!-- [Body] end -->
</html>
