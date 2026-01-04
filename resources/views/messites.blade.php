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
                  <li class="breadcrumb-item" aria-current="page">Mes Sites</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Mes Sites</h2>
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
                <h5>Mes Sites</h5>
                <div class="card-header-right">
                  <button type="button" class="btn btn-light-warning m-0" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top: 6px !important;background: #e58a00;
  color: #fff;
  border-color: #e58a00;margin-right: 22px !important;">
                    Nouveau Site
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
                            ><i data-feather="user" class="icon-svg-primary wid-20 me-2"></i>Mes Sites</h5
                          >
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <form>
                          <div class="modal-body">
                            <small id="emailHelp" class="form-text text-muted mb-2 mt-0" style="display:none;" 
                              >We'll never share your email with anyone else.</small
                            >
                            <div class="mb-3">
                              <label class="form-label">Identifiant Site</label>
                              <input
                                type="text"
                                class="form-control"
                                id="fname"
                                aria-describedby="emailHelp"
                                placeholder="Saisir l'identifiant du Site"
                              />
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Nom Site</label>
                            <input type="text"
                                class="form-control"
                                id="fname"
                                aria-describedby="emailHelp" id="" placeholder="Saisir Le Nom du site ">

                            </div>
                                   <div class="row" style="margin-bottom: 1rem !important;">
                            <div class="col-lg-6">
                              <label class="form-label">Longitude</label>
                              <!--<input type="text"
                                class="form-control"
                                id="fname"
                                aria-describedby="emailHelp" id="" placeholder="Saisir Contact"> -->
                                <input class="form-control" type="text" value="" id="demo-tel-input" placeholder="Longitude" >
                            </div>

                            <div class="col-lg-6">
                              <label class="form-label">Latitude</label>

                              <input class="form-control" type="text" value="" id="demo-email-input" placeholder="Latitude" >
                              <!--<input type="text"
                                class="form-control"
                                id="fname"
                                aria-describedby="emailHelp" id="" placeholder="Saisir Email">-->
                            </div>
                          </div>
                               <div class="row">
                <div class="col-lg-6">
                  <label class="form-label" for="exampleSelect1">Equipmentier</label>
                  <select class="form-select" id="poste">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
                   <div class="col-lg-6">
                  <label class="form-label" for="exampleSelect1">Entreprise</label>
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
                            <button type="button" class="btn btn-light-primary">Enregistrer</button>
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
                        <th class="border-top-0" style="text-transform: none !important;">Identifiant Site</th>
                        <th class="border-top-0" style="text-transform: none !important;">Nom Site</th>
                        <th class="border-top-0" style="text-transform: none !important;">Equipemenetier</th>
                        <th class="border-top-0" style="text-transform: none !important;">Entreprise</th>
                        <th class="border-top-0" style="text-align:center;text-transform: none !important;">Profil</th>
                        <th class="border-top-0" style="text-transform: none !important;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Mark Jason</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>
                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Alice Nicol</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                    <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>
                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Harry Cook</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>                        
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>


                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Tom Hannry</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>


                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Martin Frank</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>


                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Endrew Khan</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                                  <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>

                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Chritina Methewv</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>

                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Jakson Pit</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>


                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Nikolas Jons</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>


                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Nik Cage</td>
                        <td><a href="#" class="link-secondary">mark@mark.com</a></td>
                        <td>N/A</td>
                        <td>January 01,2019 at 03:35 PM</td>
                        <td class="border-top-0" align="center"> <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-download"></i></a></td>


                        <td>
                          <a href="#" class="btn btn-sm btn-light-success me-1"><i class="feather icon-edit"></i></a>
                          <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-trash-2"></i></a>
                           <a href="#" class="btn btn-sm btn-light-danger"><i class="feather icon-power"></i></a>
                        </td>
                      </tr>
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


    <!-- [Page Specific JS] start -->
    <script type="module">
      import { DataTable } from '{{ asset('assets/js/plugins/module.js') }}';
        console.log('Module imported successfully');
      window.dt = new DataTable('#report-table', { rowsPerPage: 5 });
      console.log('DataTable initialized');
    </script>
    <!-- [Page Specific JS] end -->
      





<!-- [ thememode ] start -->
  @include('thememode.thememode')
<!-- [ thememode ] end -->
   

  </body>
  <!-- [Body] end -->
</html>
