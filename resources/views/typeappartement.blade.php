<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <title>Detenteurs</title>
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
<script src="{{ asset('assets/js/tech-stack.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
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
                  <li class="breadcrumb-item" aria-current="page">Type Appartement</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Type Appartement</h2>
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
                <h5 >Type Appartement</h5>
                <div class="card-header-right">
                  <!--<button type="button" class="btn btn-light-warning m-0" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top: 6px !important;background: #e58a00;
  color: #fff;
  border-color: #e58a00;margin-right: 22px !important;">
                    Nouvel Detenteur
                  </button> -->

                  <button type="button" class="btn btn-light-warning m-0" id="buttonshowmodal" style="margin-top: 6px !important;background: #e58a00;
  color: #fff;
  border-color: #e58a00;margin-right: 22px !important;">
                    Nouvel Type Appartement
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
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titleconstruction">Type Appartement</span></h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                      <form id="typeappartForm" method="post">
                            @csrf
                          <div class="modal-body">


                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0" style="display:none;" 
                              >We'll never share your email with anyone else.</small
                            >
                            <div class="mb-3">
                              <input class="form-control" id="idlib" type="hidden" aria-describedby="idlib" name="idlib">
                              <label class="form-label">Libelle</label>
                              <input
                                type="text"
                                class="form-control"
                                id="libelletypeappartement"
                                name="libelletypeappartement"
                                aria-describedby="emailHelp"
                                placeholder="Saisir Libelle"
                              />
                            </div>
                            <div class="mb-3" style="display:none;">
                              <label class="form-label">Prenom</label>
                            <input type="text"
                                class="form-control"
                                id="fname"
                                aria-describedby="emailHelp" id="" placeholder="Saisir Prenom">

                            </div>
                                   <div class="row" style="margin-bottom: 1rem !important;display:none;">
                            <div class="col-lg-6">
                              <label class="form-label">Contact</label>
                              <!--<input type="text"
                                class="form-control"
                                id="fname"
                                aria-describedby="emailHelp" id="" placeholder="Saisir Contact"> -->
                                <input class="form-control" type="tel" value="+918888888888" id="demo-tel-input" placeholder="Saisir Contact" >
                            </div>

                            <div class="col-lg-6">
                              <label class="form-label">Email</label>

                              <input class="form-control" type="email" value="demo@example.com" id="demo-email-input" placeholder="Saisir Email" >
                              <!--<input type="text"
                                class="form-control"
                                id="fname"
                                aria-describedby="emailHelp" id="" placeholder="Saisir Email">-->
                            </div>
                          </div>
                               <div class="row" style="display:none;">
                <div class="col-lg-6">
                  <label class="form-label" for="exampleSelect1">Poste</label>
                  <select class="form-select" id="poste">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
                   <div class="col-lg-6">
                  <label class="form-label" for="exampleSelect1">Profil</label>
                  <select class="form-select" id="poste">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
              </div>

                            <div class="mb-3" style="display:none;" >
                              <label class="form-label">Joindre le Contrat</label>
                                 <div class="input-group mb-3">
                      <label class="input-group-text" for="inputGroupFile01">Upload</label>
                      <input type="file" class="form-control" id="inputGroupFile01" />
                    </div>
                            </div>
                            <div class="mb-3" style="display:none;">
                              <label class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" id="cnpasswd" placeholder="Confirm Password" />
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
                        <th class="border-top-0" style="text-transform: none !important;text-align: center;">Id </th>
                        <th class="border-top-0" style="text-transform: none !important;text-align: center;">Nom </th>
                        <th class="border-top-0" style="text-transform: none !important;text-align: center;">Actions</th>
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

<script>
      // minimum setup
    /*  (function () {
        const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
          buttonClass: 'btn'
        });
      })();

        (function () {
        const d_week = new Datepicker(document.querySelector('#pc-datepicker-2'), {
          buttonClass: 'btn'
        });
      })();*/
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


    <!-- [Page Specific JS] start -->
    <script type="module">
      /*import { DataTable } from '{{ asset('assets/js/plugins/module.js') }}';
        console.log('Module imported successfully');
      window.dt = new DataTable('#report-table', { rowsPerPage: 5 });
      console.log('DataTable initialized');*/
    </script>

<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>

<!-- DataTables JS -->
<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatablesimport/dataTables.buttons.min.js') }}"></script>

<!-- JSZip (nécessaire pour Excel) -->
<script src="{{ asset('assets/Datatablesimport/jszip.min.js') }}"></script>

<!-- Boutons Excel -->
<script src="{{ asset('assets/Datatablesimport/buttons.html5.min.js') }}"></script>
<script type="module">
 // import { DataTable } from '/assets/js/plugins/module.js';

  //console.log('Module imported successfully');





  document.addEventListener("DOMContentLoaded", function () {



  $('#report-table').DataTable({
      lengthMenu:[5,10,15,20,25],
      pageLength: 5,
      processing: true,
        serverSide: true,
     
        ajax: '{{ route("affichertypeappartement") }}', // Fetch data via AJAX
         dom: 'Bfrtip', // Ajout des boutons d'exportation
    buttons: [
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> Exporter Excel',
            className: 'btn btn-success',
            title: 'Liste Appartements'
        }
    ],
        columns: [
            {data: 'id', name: 'id'}, 
            {data: 'libelletypeappartement', name: 'libelletypeappartement'}, // Famille name
            {data: 'action', name: 'action', orderable: false, searchable: false}, // Operations (edit/delete buttons)
        ]

      });

  /*let dataTable = $('#report-table').DataTable();

    console.log("Instance DataTable :", dataTable);

            // Vérification si DataTable est bien initialisé
            if (!dataTable || typeof dataTable.clear !== "function") {
                console.error("Erreur: L'initialisation de DataTables a échoué !");
                return;
            }



    $.ajax({
    url:"{{ route('afficherdetenteurs') }}", // Update with your Laravel route
    type: "GET",
    dataType: "json",
    beforeSend: function () {
        console.log("Requête AJAX en cours d'envoi...");
    },
    success: function (response) {
        //console.log("Réponse reçue :", response);

        if (Array.isArray(response.data)) {
                    let tableData =response.data.map(item => [
                      item.id,
                        item.libelleconstruction,
                        item.action
                    ]);


//alert(tableData);
console.log("Réponse reçues :", tableData);
 dataTable.clear().rows.add(tableData).draw();
                    // Insérer les données dans le DataTable
                    //dataTable.rows.add(tableData).draw();
                }
                else{
alert(response);
                }
    },
    error: function (xhr, status, error) {
        console.error("Erreur AJAX :", error);
    }
});*/



 

   // console.log('DataTable initialized', table);
  });
</script>

  <script>
    
     $('#typeappartForm').submit(function(e) {
            e.preventDefault();
            var id = $('#idlib').val();
            var url = (id) ? '/updateypeappartement/' + id : '/typeappartementi/';
            var message = (id) ? 'Mise à jour Effectuée avec Succès !': 'Insertion effectuée avec Succès !';
            var method = (id) ? 'POST' : 'POST';
            var formData = $(this).serialize();

         $.ajax({
                type: method,
                url: url,
                data: formData,
                success: function(response) {
                    //$('#exampleModal').modal('hide'); // Hide the modal
                    //$('#report-table').DataTable().ajax.reload(); // Reload the DataTable
                    /*alert(''+message);

                     $('#typeappartForm')[0].reset(); // Réinitialiser le formulaire
                $('#report-table').DataTable().ajax.reload();*/
if (response.success) {

  alert(response.message); // Afficher un message de succès

    $('#report-table').DataTable().ajax.reload();
                   if(url !='/updateypeappartement/' + id){

                       $('#typeappartForm')[0].reset(); // Réinitialiser le formulaire

                   }
                   else{

                    $('#exampleModal').modal('hide'); // Hide the modal

                   }
                  
                 
                 
                }


                },
                error: function(error) {
                    console.log(error);
                   // alert('An error occurred.');

                     if (error.status === 422) { // Erreur de validation
                    let errors = error.responseJSON.errors;
                    if (errors.libelletypeappartement) {
                        //$('#error-libelleconstruction').text(errors.libelleconstruction[0]); // Afficher l'erreur sous l'input

                      alert(errors.libelletypeappartement[0]);
                    }
                }
                }
            });

          });

      $('body').on('click', '.deletetypeappartement', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = '/supptypeappartement/' + id;

        if (confirm('Voulez vous vraiment supprimer l\'enregistrement <<'+name.toUpperCase()+'>>?')) {




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
        }
      // alert(name);
    });

       $('body').on('click', '.rollbacktypeappartement', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = '/rollbacktypeappartement/' + id;

        if (confirm('Voulez vous vraiment Retablir Cet enregistrement <<'+name.toUpperCase()+'>>?')) {




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
        }
      // alert(name);
    });


      $('body').on('click', '.edittypeappartement', function () {
        var id = $(this).data('id');
        
 


       $.get('/gettypeappartementpar/' + id, function (data) {
            // Populate the modal form with the fetched data
           // alert(data.libelefamille);
           $('#titleconstruction').html('Modifier Libelle Type Appartement'); 
           $("#idlib").val(id);
            $('#libelletypeappartement').val(data.libelletypeappartement);

            
            $('#exampleModal').modal('show');
        });


    });

      $("#buttonshowmodal").on('click',function(){



            $('#titleconstruction').html('Type Appartement'); 
           $("#idlib").val("");
            $('#libelleconstruction').val("");

            
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
