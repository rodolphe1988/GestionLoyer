<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->

   @include('headerlink.headerlink')
   <style>
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
                  <li class="breadcrumb-item" aria-current="page">Appartements</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Appartements</h2>
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
                <h5>Appartement</h5>
                <div class="card-header-right">
                  <!--data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                  <button type="button" class="btn btn-light-warning m-0"  id="showdialog" style="margin-top: 6px !important;background: #e58a00;
  color: #fff;
  border-color: #e58a00;margin-right: 22px !important;">
                    Nouvel Appartement
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
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i><span id="titlemaison">Appartement</span></h5
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
                              <label class="form-label" for="denomination" >Denomination Maison</label>
                          <input type="hidden" name="denominationhid" id="denominationhid" value="" />
                          <select class="form-select" name="denomination" id="denomination" style='margin-top:10px;' required>
                                <option value="">Sélectionner Denomination Maison</option>
                              @if(isset($denominationmaison) && $denominationmaison->count() > 0)
                                @foreach($denominationmaison as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->denomination)) }}</option>
                                @endforeach
                              @endif
                            </select>

                            </div>
   <div class="mb-3">
                            <label for="detenteur" class="form-label">Numero Appartement</label>
                                <input
                                type="text"
                                class="form-control"
                                id="numappartdisa"
                                name="numappartdisa"
                                aria-describedby="emailHelp"
                                placeholder="Numero Appartement"
                              />
                                <input type="hidden" name="numapparthid" id="numapparthid" value="" />
                                    <input
                                type="hidden"
                                class="form-control"
                                id="numappart"
                                name="numappart"
                                aria-describedby="emailHelp"
                                placeholder="numappart"
                              />
                        </div> 
                             <div class="mb-3">
                            <label for="typeappartement" class="form-label">Type Appartement</label>
                            <select class="form-select" name="typeappartement" id="typeappartement" required>
                                <option value="">Sélectionner un type Appartement</option>
                              @if(isset($typeappart) && $typeappart->count() > 0)
                                @foreach($typeappart as $type)
                                    <option value="{{ $type->id }}">{{ ucwords(strtolower($type->libelletypeappartement)) }}</option>
                                @endforeach
                              @endif
                            </select>
                        </div>

                            <div class="mb-3">
                            <label for="typelocation" class="form-label">Type Location</label>
                            <select class="form-select" name="typelocation" id="typelocation" required>
                                <option value="">Sélectionner Type Location</option>
                              @if(isset($typelocation) && $typelocation->count() > 0)
                                @foreach($typelocation as $type)
                                    <option value="{{ $type->id }}">{{ ucwords($type->libelletypelocation) }}</option>
                                @endforeach
                              @endif
                            </select>
                        </div> 
                            <div class="mb-3">
                             <label for="montantlocation" class="form-label">Montant Loyer</label>
                                 <input
                                type="text"
                                class="form-control"
                                id="montantlocation"
                                name="montantlocation"
                                aria-describedby="emailHelp"
                                placeholder="Montant Loyer"
                              />
                            </div>
                            <div class="mb-3">
              <label class="form-label" for="nbmremoiscaution" >Nombre Mois Caution</label>
                              <input
                                type="number"
                                class="form-control"
                                id="nbmremoiscaution"
                                name="nbmremoiscaution"
                                aria-describedby="emailHelp"
                                placeholder="Saisir Nombre Mois Caution"
                              />
                            </div>

                            <div class="mb-3">
              <label class="form-label" for="fname" >Description</label>
              <textarea class="form-control" cols="2" rows="4" name="description" ></textarea>

            </div>
   <div class="mb-3" id="motifmodification" style="display:none;">
            <label><strong>Motif de la modification :</strong></label><br>
<div style="margin-top: 10px;
  margin-bottom: 10px;">
  <input type="radio" id="correction" name="modification_type" value="correction" checked style="margin-right: 10px;">
  <label for="correction">🛠 Je corrige une erreur d’enregistrement</label>
</div>
<div style="display: flex;">
  <input type="radio" id="changement" name="modification_type" value="changement" style="margin-right: 10px">
  <div style="padding-top: 19px;">
  <label for="changement">📈 Il s’agit d’un changement officiel du montant du loyer ou de la caution</label>
  </div>
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
                </div>
              </div>
              <div class="card-body shadow border-0">
                <div class="table-responsive" >
                  <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                      <tr>
                        <th class="border-top-0" style="text-transform: none !important;">Id</th>
                        <th class="border-top-0" style="text-transform: none !important;">Denomination Maison</th>
                        <th class="border-top-0" style="text-transform: none !important;">Num Appart</th>
                        <th class="border-top-0" style="text-transform: none !important;">Type Appart</th>
                        <th class="border-top-0" style="text-transform: none !important;">Type Location</th>
                        <th class="border-top-0" style="text-transform: none !important;">Montant Loyer</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Nmbre Mois Caution</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Montant Total Caution</th>
                        <!--<th class="border-top-0" style="text-align:center;text-transform: none !important;">Description</th> -->
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

<!--<script src="{{ asset('assets/Datatablesimport/jquery.dataTables.min.js') }}"></script>


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


    <!-- [Page Specific JS] start -->
    <script type="module">
     
     /* import { DataTable } from '{{ asset('assets/js/plugins/module.js') }}';
        console.log('Module imported successfully');
      window.dt = new DataTable('#report-table', { rowsPerPage: 5 });
      console.log('DataTable initialized');*/


</script>

<script>
   document.getElementById("montantlocation").addEventListener("input", function (e) {
       this.value = this.value.replace(/[^0-9]/g, ""); // Allow only digits
   });
      document.getElementById("nbmremoiscaution").addEventListener("input", function (e) {
       this.value = this.value.replace(/[^0-9]/g, ""); // Allow only digits
   });

$('#montantlocation').divide({

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
        lengthMenu: [ [5,10, 25, 50, 100, -1], [5,10, 25, 50, 100, "Tous"] ],
      pageLength: 5,
      processing: true,
        serverSide: true,
      scrollX: false,   // désactive le scroll horizontal
    autoWidth: false, // empêche que DataTables ajoute des largeurs trop grandes
    responsive: true,
        ajax: '{{ route("afficherappartement") }}', // Fetch data via AJAX
        // dom: 'Bfrtip', // Ajout des boutons d'exportation
         // dom: 'Blfrtip', 
        dom: 'Blfrtip',
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
            {data: 'denomination', name: 'denomination'}, // Famille name
            {data: 'numappartement', name: 'numappartement'}, 
            {data: 'typeappartement', name: 'typeappartement'},
            {data: 'typelocation', name: 'typelocation'},
            {data: 'montantloyer', name: 'montantloyer'},
            {data: 'nbremoiscaution', name: 'nbremoiscaution'},
            {data: 'montanttotalcaution', name: 'montanttotalcaution'},
            //{data: 'description', name: 'description'},
            {data: 'etat', name: 'etat'},
            //{data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false}, // Operations (edit/delete buttons)
        ]
        

      });

 
  });
   </script>

    <script type="text/javascript">

      $('#denomination').change(function () {
            var id = $(this).val();
            if(id!=""){
           //   alert(id);
            if (id) {
                $.ajax({
                    url: '/getrang/' + id,
                    type: 'GET',
                    success: function (response) {
                     //   $('#email').val(response.email);

                      //alert(response);
                       console.log(response);

                       $("#numappart").val(response);

                       $("#numappartdisa").val(response);
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
            var url = (id) ? '/updateappartement/' + id : '/appartementi/';
            var message = (id) ? 'Mise à jour Effectuée avec Succès !': 'Insertion effectuée avec Succès !';
            var method = (id) ? 'POST' : 'POST';
            var formData = $(this).serialize();

         $.ajax({
                type: method,
                url: url,
                data: formData,
                success: function(response) {
                 
if (response.success) {

  //alert(response.message); // Afficher un message de succès

              //Swal.fire(response.message, "", "success");


   $('.modal').css('z-index', '1050');


           Swal.fire({title: 'Infos',
  text: response.message,
  icon: 'success',
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    });


    $('#report-table').DataTable().ajax.reload();
                   if(url !='/updateappartement/' + id){

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

            //alert(errorMessage);

           // Swal.fire(errorMessage, "", "error");

                       Swal.fire({title: 'Infos',
  text:errorMessage,
  icon: 'error',
 didOpen: () => {
        $('.swal2-container').css('z-index', '1060');
      },
      didClose: () => {
        // Réinitialiser le z-index de la modal après la fermeture du Swal
        $('.modal').css('z-index', '1081');
      }
    });
                    //}
                }
                else{
                 // alert(error.status);
                  // Swal.fire(error.status, "", "error");

                   Swal.fire({title: 'Infos',
  text:error.status,
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

               $('body').on('click', '.editappartement', function () {
        var id = $(this).data('id');
        
 


       $.get('/getappartementpar/' + id, function (data) {
            // Populate the modal form with the fetched data
           // alert(data.libelefamille);

           $("#motifmodification").show();
            $('#titlemaison').html('Modifier Appartement'); 
            $("#idlib").val(id);
            $('#denomination').val(data.idmaison);
             $('#denominationhid').val(data.idmaison);
            $('#numappart').val(data.numappartement);
            $("#numappartdisa").val(data.numappartement);
            $("#numappartdisa").prop("disabled", true);
            $('#numapparthid').val(data.numappartement);
            $("#typeappartement").val(data.typeappartement);
            $("#typelocation").val(data.typelocation);
            $("#montantlocation").val(data.montantloyer);
            $("#nbmremoiscaution").val(data.nbremoiscaution);
            $('#denomination').prop("disabled",true);

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

                $("#showdialog").on('click',function(){

            $("#motifmodification").hide();
            $('#denomination').prop("disabled",false);
            $('#titlemaison').html('Appartement'); 
           $("#idlib").val("");
            $('#denomination').val("");
            $('#numappart').val("");
            $('#numappartdisa').val("");
             $("#numappartdisa").prop("disabled", true);
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
