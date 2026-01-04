<!doctype html>
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
    text-align: center;
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


</style>


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
                  <li class="breadcrumb-item" aria-current="page">Patrimoine Immobilier</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Patrimoine Immobilier</h2>
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
                <h5>Patrimoine Immobilier</h5>
                <div class="card-header-right">
                  <!--data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                  <button type="button" class="btn btn-light-warning m-0"  id="showdialog" style="margin-top: 6px !important;background: #e58a00;
  color: #fff;
  border-color: #e58a00;margin-right: 22px !important;">
                    Nouveau Patrimoine Immobilier
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
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titlemaison">Patrimoine Immobilier</span></h5
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
                              <label class="form-label" for="denomination" >Denomination du Bien Immobilier</label>
                              <input
                                type="text"
                                class="form-control"
                            
                                aria-describedby="emailHelp"
                                name="denomination"
                                id="denomination"
                                placeholder="Saisir La Denomination du Bien Immobilier" required />
                            </div>
   <div class="mb-3">
                            <label for="detenteur" class="form-label">Detenteur du Bien</label>
                            <select class="form-select" name="detenteur" id="detenteur" required>
                                <option value="">Sélectionner Detenteur</option>
                                @foreach($detenteurs as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->libelledetenteurs)) }}</option>
                                @endforeach
                            </select>
                        </div> 
                             <div class="mb-3">
                            <label for="typeimmobilier" class="form-label">Type Immobilier</label>
                            <select class="form-select" name="typeimmobilier" id="typeimmobilier" required>
                                <option value="">Sélectionner un type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->libelleconstruction)) }}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <select class="form-select" name="ville" id="ville" required>
                                <option value="">Sélectionner Ville</option>
                                @foreach($ville as $type)
                                    <option value="{{ $type->id }}">{{ ucwords($type->ville) }}</option>
                                @endforeach
                            </select>
                        </div> 
                            <div class="mb-3">
                             <label for="commune" class="form-label">Commune</label>
                            <select class="form-select" name="commune" id="commune" required>
                                <option value="">Sélectionner Commune</option>
                                @foreach($commune as $type)
                                    <option value="{{ $type->id }}">{{ ucwords($type->commune) }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="mb-3">
              <label class="form-label" for="quartier" >Quartier</label>
                              <input
                                type="text"
                                class="form-control"
                                id="quartier"
                                name="quartier"
                                aria-describedby="emailHelp"
                                placeholder="Saisir Le Quartier"
                              />
                            </div>
    <div class="mb-3">
              <label class="form-label" for="adresse" >Adresse</label>
                              <input
                                type="text"
                                class="form-control"
                                id="adresse"
                                name="adresse"
                                aria-describedby="emailHelp"
                                placeholder="Saisir Adresse"
                              />
                            </div>

                            <div class="mb-3">
              <label class="form-label" for="fname" >Description</label>
              <textarea class="form-control" cols="2" rows="4" name="description" ></textarea>

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
                </div>
              </div>
              <div class="card-body shadow border-0">
                <div class="table-responsive">
                  <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Id</th>
                        <th class="border-top-0" style="text-transform: none !important;">Denomination Immob</th>
                        <th class="border-top-0" style="text-transform: none !important;">Detenteur</th>
                        <th class="border-top-0" style="text-transform: none !important;">Type Immob</th>
                        <th class="border-top-0" style="text-transform: none !important;">Ville</th>
                        <th class="border-top-0" style="text-transform: none !important;">Commune</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Quartier</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Adresse</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Etat</th>
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

<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>

<!-- DataTables JS -->
<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatablesimport/dataTables.buttons.min.js') }}"></script>

<!-- JSZip (nécessaire pour Excel) -->
<script src="{{ asset('assets/Datatablesimport/jszip.min.js') }}"></script>

<!-- Boutons Excel -->
<script src="{{ asset('assets/Datatablesimport/buttons.html5.min.js') }}"></script>

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

<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>

<!-- DataTables JS -->
<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatablesimport/dataTables.buttons.min.js') }}"></script>

<!-- JSZip (nécessaire pour Excel) -->
<script src="{{ asset('assets/Datatablesimport/jszip.min.js') }}"></script>

<!-- Boutons Excel -->
<script src="{{ asset('assets/Datatablesimport/buttons.html5.min.js') }}"></script>


    <!-- [Page Specific JS] start -->
    <script type="module">
     
     /* import { DataTable } from '{{ asset('assets/js/plugins/module.js') }}';
        console.log('Module imported successfully');
      window.dt = new DataTable('#report-table', { rowsPerPage: 5 });
      console.log('DataTable initialized');*/


</script>


   <script type="module">

    document.addEventListener("DOMContentLoaded", function () {



  $('#report-table').DataTable({
      lengthMenu:[5,10,15,20,25],
      pageLength: 5,
      processing: true,
        serverSide: true,
     
        ajax: '{{ route("affichermaison") }}', // Fetch data via AJAX
         //dom: 'Bfrtip', // Ajout des boutons d'exportation
         dom: 'Blfrtip', 
    buttons: [
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> Exporter Excel',
            className: 'btn btn-success',
            title: 'Liste Biens Immobiliers'
        }
    ],
        columns: [
            {data: 'id', name: 'id'}, 
            {data: 'denomination', name: 'denomination'}, // Famille name
            {data: 'detenteur', name: 'detenteur'}, 
            {data: 'typeimmob', name: 'typeimmob'},
            {data: 'ville', name: 'ville'},
            {data: 'commune', name: 'commune'},
            {data: 'quartier', name: 'quartier'},
            {data: 'adresse', name: 'adresse'},
            {data: 'etat', name: 'etat'},
            //{data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false}, // Operations (edit/delete buttons)
        ]
        

      });

 
  });
   </script>

    <script type="text/javascript">
       $('#deteteursForm').submit(function(e) {
            e.preventDefault();
 

           var id = $('#idlib').val();
            var url = (id) ? '/updatemaison/' + id : '/maisoni/';
            var message = (id) ? 'Mise à jour Effectuée avec Succès !': 'Insertion effectuée avec Succès !';
            var method = (id) ? 'POST' : 'POST';
            var formData = $(this).serialize();

         $.ajax({
                type: method,
                url: url,
                data: formData,
                success: function(response) {
                 
if (response.success) {

  alert(response.message); // Afficher un message de succès

    $('#report-table').DataTable().ajax.reload();
                   if(url !='/updatemaison/' + id){

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
                    //}
                }
                else{
                  alert(error.status);
                }
                }
            });



          });



        $('body').on('click', '.deletemaison', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = '/suppmaison/' + id;

        Swal.fire({
  title: "Voulez vous vraiment supprimer l\'enregistrement ("+name.toUpperCase()+") ?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Oui",
  denyButtonText: "Non",
  cancelButtonText:"Annuler",
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    //Swal.fire("Saved!", "", "success");

          $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable
                   // alert('Enregistrement Supprimé avec succès!');


Swal.fire('Enregistrement Supprimé avec succès!', "", "success");

                },
                error: function(error) {
                    console.log(error);
                    alert('An error occurred.');
                }
            });



  } else if (result.isDenied) {
    Swal.fire("Aucune Modification n'a été apportée", "", "info");
  }
});

      /*  if (confirm('Voulez vous vraiment supprimer l\'enregistrement <<'+name.toUpperCase()+'>>?')) {




            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable
                    alert('Enregistrement Supprimé avec succès!');
                },
                error: function(error) {
                    console.log(error);
                    alert('An error occurred.');
                }
            });
        }*/
      // alert(name);
    });

         $('body').on('click', '.rollbackmaison', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = '/rollbackmaison/' + id;


Swal.fire({
  title: "Voulez vous vraiment Retablir Cet enregistrement ("+name.toUpperCase()+") ?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Oui",
  denyButtonText: "Non",
  cancelButtonText:"Annuler",
}).then((result) => {

    if (result.isConfirmed) {

         $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    

                    if (response.success) {
                    //alert(response.success);

                    Swal.fire(''+response.success, "", "success");
                    
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable

                  }


                },
                error: function(error) {
                    console.log(error);
                    alert('An error occurred.');
                }
            });


        
        } 

        else if (result.isDenied) {
    Swal.fire("Aucune Modification n'a été apportée", "", "info");
  }

  });
       /* if (confirm('Voulez vous vraiment Retablir Cet enregistrement <<'+name.toUpperCase()+'>>?')) {




            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    

                    if (response.success) {
                    alert(response.success);
                    $('#report-table').DataTable().ajax.reload(); // Reload the DataTable

                  }


                },
                error: function(error) {
                    console.log(error);
                    alert('An error occurred.');
                }
            });
        }*/
      // alert(name);
    });

               $('body').on('click', '.editmaison', function () {
        var id = $(this).data('id');
        
 


       $.get('/getmaisonpar/' + id, function (data) {
            // Populate the modal form with the fetched data
           // alert(data.libelefamille);
           $('#titlemaison').html('Modifier Patrimoine Immobilier'); 
           $("#idlib").val(id);
            $('#denomination').val(data.denomination);
            $('#denomination').prop("readonly",true);
            $('#detenteur').val(data.detenteur);
            $('#typeimmobilier').val(data.typeimmob);
             $('#ville').val(data.ville);
             $('#commune').val(data.commune);
             $('#quartier').val(data.quartier);
             $('#adresse').val(data.adresse);
             $('#description').val(data.description);
            $('#exampleModal').modal('show');
        });


    });

                $("#showdialog").on('click',function(){



            $('#titlemaison').html('Patrimoine Immobilier'); 
           $("#idlib").val("");
            $('#denomination').val("");
              $('#denomination').prop("readonly",false);

            
            $('#exampleModal').modal('show');



      });

    </script>

    <!-- [Page Specific JS] end -->
      





<!-- [ thememode ] start -->
  @include('thememode.thememode')
<!-- [ thememode ] end -->
   

  </body>
  <!-- [Body] end -->
</html>
