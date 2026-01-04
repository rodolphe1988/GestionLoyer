<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <title>GestLoyer</title>
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
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
 <!-- [Font] Family -->
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

<style>
/*  [data-pc-layout="color-header"] .pc-container .pc-content {
  background:#F4F4F4 !important;

}

[data-pc-direction="ltr"] .bg-body {
  --bs-bg-opacity: 1;
  background-color: #F4F4F4 !important;
}*/
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        <!-- [ Main Content ] start -->
        <div class="row">
       
<!-- [ banner ] start -->
  @include('banner.barnerbleu')
<!-- [ banner ] end -->

           <!-- [ breadcrumb ] start -->
        <div class="page-header" style="margin-left:20px;display:none;">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard/index.html" style="display:none;">Accueil</a></li>
                  <li class="breadcrumb-item" aria-current="page" style="display:none;" >Membership List</li>
                </ul>
              </div>
              <div class="col-md-12" style="display:none;">
                <div class="page-header-title">
                  <h2 class="mb-0">Membership List</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
          <div class="col-md-6 col-xxl-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <div class="avtar avtar-s bg-light-primary">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          opacity="0.4"
                          d="M13 9H7"
                          stroke="#4680FF"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M22.0002 10.9702V13.0302C22.0002 13.5802 21.5602 14.0302 21.0002 14.0502H19.0402C17.9602 14.0502 16.9702 13.2602 16.8802 12.1802C16.8202 11.5502 17.0602 10.9602 17.4802 10.5502C17.8502 10.1702 18.3602 9.9502 18.9202 9.9502H21.0002C21.5602 9.9702 22.0002 10.4202 22.0002 10.9702Z"
                          stroke="#4680FF"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M17.48 10.55C17.06 10.96 16.82 11.55 16.88 12.18C16.97 13.26 17.96 14.05 19.04 14.05H21V15.5C21 18.5 19 20.5 16 20.5H7C4 20.5 2 18.5 2 15.5V8.5C2 5.78 3.64 3.88 6.19 3.56C6.45 3.52 6.72 3.5 7 3.5H16C16.26 3.5 16.51 3.50999 16.75 3.54999C19.33 3.84999 21 5.76 21 8.5V9.95001H18.92C18.36 9.95001 17.85 10.17 17.48 10.55Z"
                          stroke="#4680FF"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">Detenteurs</h6>
                  </div>
                  <div class="flex-shrink-0 ms-3">
                    <div class="dropdown">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        style="display:none;"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots-vertical f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end" style="display:none;">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="bg-body p-3 mt-3 rounded">
                  <!--<div class="mt-3 row align-items-center">-->
                    <div class="align-items-center">
                    <div class="col-7" style="text-align: center;margin-left: auto;margin-right: auto;">
                      <div id="all-earnings-graph" style="display:none;"></div>

                       <h5 class="mb-1" id="detenteurs"></h5>
                      <a href="{{ route('detenteur') }}" ><p class="text-primary mb-0"><i class="ti ti-arrow-up-right"></i> Voir plus</p>
                      </a>
                    </div>
                    <div class="col-5">
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xxl-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <div class="avtar avtar-s bg-light-warning">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z"
                          stroke="#E58A00"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.6"
                          d="M14.5 4.5V6.5C14.5 7.6 15.4 8.5 16.5 8.5H18.5"
                          stroke="#E58A00"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.6"
                          d="M8 13H12"
                          stroke="#E58A00"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.6"
                          d="M8 17H16"
                          stroke="#E58A00"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">Locataires</h6>
                  </div>
                  <div class="flex-shrink-0 ms-3">
                    <div class="dropdown">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        style='display:none;'
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots-vertical f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end"  style='display:none;' >
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="bg-body p-3 mt-3 rounded">
                  <!--<div class="mt-3 row align-items-center"> -->
                     <div class="align-items-center">
                    <div class="col-7" style="text-align: center;margin-left: auto;margin-right: auto;">
                      <div id="page-views-graph"  style='display:none;' ></div>
                      <h5 class="mb-1" id="locataires" ></h5>
                      <a href="{{ route('locataire') }} "><p class="text-warning mb-0"><i class="ti ti-arrow-up-right"></i>Voir plus</p></a>
                    </div>
                    <div class="col-5">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xxl-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0">
                    <div class="avtar avtar-s bg-light-success">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M8 2V5"
                          stroke="#2ca87f"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M16 2V5"
                          stroke="#2ca87f"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M3.5 9.08984H20.5"
                          stroke="#2ca87f"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                          stroke="#2ca87f"
                          stroke-width="1.5"
                          stroke-miterlimit="10"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M15.6947 13.7002H15.7037"
                          stroke="#2ca87f"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M15.6947 16.7002H15.7037"
                          stroke="#2ca87f"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M11.9955 13.7002H12.0045"
                          stroke="#2ca87f"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M11.9955 16.7002H12.0045"
                          stroke="#2ca87f"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M8.29431 13.7002H8.30329"
                          stroke="#2ca87f"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M8.29395 16.7002H8.30293"
                          stroke="#2ca87f"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">Disponibilite Appart</h6>
                  </div>
                  <div class="flex-shrink-0 ms-3">
                    <div class="dropdown">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots-vertical f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="bg-body p-3 mt-3 rounded">
                  <!--<div class="mt-3 row align-items-center">-->
                    <div class="align-items-center">
                    <div class="col-7" style="text-align: center;margin-left: auto;margin-right: auto;">
                      <div id="total-task-graph" style="display:none;"></div>
                       <h5 class="mb-1" id="nmbreappartdispo" >Aucune</h5>
                      <a href="{{ route('appartement') }} "><p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i>Voir plus</p></a>
                    </div>
                    <div class="col-5">
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
 <!--<div class="col-md-12"> -->
   <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between" style="margin-bottom:40px;" >
                <a href="{{ route('paiementloyer') }}" style="width:100%;" >
                  <button type="button" class="btn" id="recherchedialog" style="background: #2ca87f !important;
  color: #fff !important;
  border-color: #e58a00 !important;
  border-color: #2ca87f !important;
  border-radius: 6px !important;width:100%;">
                   <h5 class="mb-0" style="color:white;" >Stats Flux Entrants Par Detenteur</h5>
                  </button></a>
                    
                  <div class="dropdown" style="display:none;">
                    <a
                      class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                      href="#"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="ti ti-dots-vertical f-18" style="margin-top:20px;" ></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">Today</a>
                      <a class="dropdown-item" href="#">Weekly</a>
                      <a class="dropdown-item" href="#">Monthly</a>
                    </div>
                  </div>
                </div>
              <div class="d-flex justify-content-between align-items-center" style="width:100%;">
                <label id="mois" style="color:#E58A00;font-weight: bold;"></label>
            
        <input
            type="month"
            id="filter-datefluxentrant"
            name="filter-datefluxentrant"
            class="form-control form-control-sm"
            style="width: 180px;"
          />
            
            </div>
                <div id="total-income-graph1"  ></div>
                <div class="row g-3 mt-3" id="listeDetenteurs" >

                


        

  


                  
                  
                </div>
              </div>
            </div>
          </div>

             <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between" style="margin-bottom:40px;">
                    <a href="{{ route('paiementloyer') }}" style="width:100%;">
                    <button type="button" class="btn" id="recherchedialog" style="background: #2ca87f !important;
  color: #fff !important;
  border-color: #e58a00 !important;
  border-color: #2ca87f !important;
  border-radius: 6px !important;width:100%;">
                  <h5 class="mb-0" style="color:white;" >Stats Flux Sortants Par Detenteur</h5>
</button>  </a>



                  <div class="dropdown" style="display:none;" >
                    <a
                      class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                      href="#"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="ti ti-dots-vertical f-18"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">Today</a>
                      <a class="dropdown-item" href="#">Weekly</a>
                      <a class="dropdown-item" href="#">Monthly</a>
                    </div>
                  </div>
                </div>
            
          <!-- 🔽 Sélecteur de date (mois) -->
    <div  class="d-flex justify-content-between align-items-center" style="width:100%;">

        <input
            type="month"
            id="filter-datefluxsortant"
            name="filter-datefluxsortant"
            class="form-control form-control-sm"
            style="width: 180px;"
          />
           <label id="mois2" style="color: #E58A00;font-weight: bold;"></label>
  </div>

   

                <div id="total-income-graph2"></div>
                <div id="totalfluxsortant" ></div>
                <div class="row g-3 mt-3" id="listeDetenteurssortants" >
                  <div class="col-sm-6">
                    <div class="bg-body p-3 rounded">
                      <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block bg-primary rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <p class="mb-0">
                           Famille kouedoman
                        </p>
                        </div>
                      </div>
                      <h6 class="mb-0"
                        >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                      >
                         <h6 class="mb-0"
                        >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                      >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="bg-body p-3 rounded">
                      <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block bg-warning rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <p class="mb-0">Enfants megnan</p>
                        </div>
                      </div>
                      <h6 class="mb-0"
                        >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                      >
                        <h6 class="mb-0"
                        >$23,876 <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small></h6
                      >
                    </div>
                  </div>
               
                
                </div>
                
              </div>
            </div>
          </div>




<!-- </div>-->



















            












          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                  <div class="flex-grow-1">
                    <h5 class="mb-0" style="display:none !important;">Evolution </h5>
                  </div>
                  <div class="flex-shrink-0 ms-3">
                    <div class="dropdown" style="display:none !important;">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i class="ti ti-dots f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end" style="display:none;" >
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                </div>
                <h5 class="text-end my-2" style="display:none;" >5.44% <span class="badge bg-success">+2.6%</span> </h5>
                <div id="customer-rate-graph2"></div>
              </div>
            </div>
          </div>




           <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                  <div class="flex-grow-1">
                    <h5 class="mb-0" style="display:none !important;" >Evolution </h5>
                  </div>
                  <div class="flex-shrink-0 ms-3">
                    <div class="dropdown" style="display:none !important;">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        style="display:none !important;"
                      >
                        <i class="ti ti-dots f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end" style="display:none !important;" >
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                </div>
                <h5 class="text-end my-2" style="display:none;" >5.44% <span class="badge bg-success">+2.6%</span> </h5>
                <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Top 10 des locataires les plus ponctuels</h5>
<div class="d-flex gap-2 align-items-center">
          <!-- 🔽 Sélecteur de date (mois) -->
        <input
            type="month"
            id="filter-datetop10"
            name="filter-datetop10"
            class="form-control form-control-sm"
            style="width: 180px;display:;"
           readonly />
        <!-- 🔽 Menu déroulant de filtre -->
        <select id="filter-detenteur" class="form-select w-auto">
          <option value="">Tous les détenteurs</option>
        </select>
      </div>
       </div>
                <div id="customer-rate-graph3"></div>
              </div>
            </div>
          </div>


           <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                  <div class="flex-grow-1">
                    <h5 class="mb-0" style="display:none !important;" >Evolution </h5>
                  </div>
                  <div class="flex-shrink-0 ms-3">
                    <div class="dropdown" style="display:none !important;">
                      <a
                        class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        style="display:none !important;"
                      >
                        <i class="ti ti-dots f-18"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end" style="display:none !important;" >
                        <a class="dropdown-item" href="#">Today</a>
                        <a class="dropdown-item" href="#">Weekly</a>
                        <a class="dropdown-item" href="#">Monthly</a>
                      </div>
                    </div>
                  </div>
                </div>
         <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0" style="display:non;">Versement Total Par Denomination Par Mois de versement</h5>
<div class="d-flex gap-2 align-items-center">
          <!-- 🔽 Sélecteur de date (mois) -->
          <input
            type="month"
            id="filter-date"
            name="filter-date"
            class="form-control form-control-sm"
            style="width: 180px;"
          />
        <!-- 🔽 Menu déroulant de filtre -->
        <select id="filter-detenteurdenomi" class="form-select w-auto">
          <option value="">Tous les détenteurs</option>
        </select>
         </div> 
      </div>                <div id="customer-rate-graph4"></div>
              </div>
            </div>
          </div>
         
         


    
        <!-- [ Main Content ] end -->
</div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    
<!-- [ footer ] start -->
  @include('footer.footer')
<!-- [ footer ] end -->




<!-- [ thememode ] start -->
  @include('thememode.thememode')
<!-- [ thememode ] end -->


    <!-- [Page Specific JS] start -->
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
 <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>


    <div class="floting-button" style="display: none;" >
      <a href="https://1.envato.market/zNkqj6" class="btn btn btn-danger buynowlinks d-inline-flex align-items-center gap-2" data-bs-toggle="tooltip" title="Buy Now">
        <i class="ph-duotone ph-shopping-cart"></i>
        <span>Buy Now</span>
    
      </a>
    </div>
    
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
    <script>
      function ucfirst(str) {
    if (!str) return "";
    str = str.toLowerCase();
    return str.charAt(0).toUpperCase() + str.slice(1);
}
      </script>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/fr.js"></script>

      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
var chart=null;
  $.getJSON('/getnombrepardetenteurs', function(data) {
    let series = [];
    let labels = [];
    let colors = ['#4680FF', '#E58A00', '#F43F5E', '#10B981', '#8B5CF6']; // couleurs à ajuster selon le nombre de détenteurs

    totauxGlobaux = data.totauxGlobaux;
    console.log('Totaux globaux :', totauxGlobaux);
    $('#mois').html("Mois En Cours : "+totauxGlobaux.moisTexte);
    $('#mois2').html("Mois En Cours : "+totauxGlobaux.moisTexte);
    // Génération des séries, labels et légende
    let lignes = '';
    data.parDetenteur.forEach(function(item, index){
        let verse = item.totalVerse; // brut pour le donut
        let verseAffiche = new Intl.NumberFormat('fr-FR').format(item.totalVerse);
        let totalReliquat=item.totalReliquat;
        let totalReliquatAffiche = new Intl.NumberFormat('fr-FR').format(item.totalReliquat);
        let totalAttendu=item.total_attendu;
        let totalAttenduAffiche = new Intl.NumberFormat('fr-FR').format(item.total_attendu);
        let restanttotal=item.total_attendu - item.totalVerse;
        let restanttotalAffiche = new Intl.NumberFormat('fr-FR').format(item.total_attendu - item.totalVerse);
        series.push(Number(verse));
        labels.push(ucfirst(item.detenteur));

        console.log('Series pour le chart :', series);

        // couleur correspondante
        let color = colors[index % colors.length]; // pour éviter les débordements si plus de couleurs

        lignes += `<div class="col-sm-6">
                    <div class="bg-body p-3 rounded">
                      <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block" style="background-color:${color}; border-radius:50%;">
                            <span class="visually-hidden">Color</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <p class="mb-0">${ucfirst(item.detenteur)}</p>
                        </div>
                      </div>
                      <h6 class="mb-0">${verseAffiche} FCFA <small class="text-muted" style="color:red !important;font-weight:bold;"><i class="ti ti-chevrons-up"></i>${totalReliquatAffiche} FCFA</small></h6>
                      <h6 class="mb-0">${totalAttenduAffiche} FCFA <small class="text-muted" style="color:red !important;font-weight:bold;"><i class="ti ti-chevrons-up"></i>${restanttotalAffiche} FCFA</small></h6>

                      </div>
                  </div>`;
    });

    $('#listeDetenteurs').html(lignes);

    // Création du donut ApexCharts
    var options = {
        chart: {
            height: 320,
            type: 'donut'
        },
        series: series,
       // series: [27, 23],
        labels: labels,
        colors: colors,
        fill: {
        opacity: [1, 1, 1, 0.3]
      },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    labels: {
                        show: true,
                        name: { show: true },
                        value: { 
                            show: true,
                            formatter: function(val) {
                                return new Intl.NumberFormat('fr-FR').format(val) + " FCFA";
                            }
                        }
                    }
                }
            }
        },
       /* legend: {
            position: 'bottom'
        }*/
    };

   chart = new ApexCharts(document.querySelector("#total-income-graph1"), options);
    chart.render();

    /*var chart2 = new ApexCharts(document.querySelector("#total-income-graph2"), options);

    chart2.render();*/
});

function chargerFluxEntrants(mois){

  $.getJSON('/getnombrepardetenteurs',{ mois: mois }, function(data) {
    let series = [];
    let labels = [];
    let colors = ['#4680FF', '#E58A00', '#F43F5E', '#10B981', '#8B5CF6']; // couleurs à ajuster selon le nombre de détenteurs

    totauxGlobaux = data.totauxGlobaux;
    console.log('Totaux globaux :', totauxGlobaux);
    $('#mois').html("Mois En Cours : "+totauxGlobaux.moisTexte);
   // $('#mois2').html("Mois En Cours : "+totauxGlobaux.moisTexte);
    // Génération des séries, labels et légende
    let lignes = '';
    data.parDetenteur.forEach(function(item, index){
        let verse = item.totalVerse; // brut pour le donut
        let verseAffiche = new Intl.NumberFormat('fr-FR').format(item.totalVerse);
        let totalReliquat=item.totalReliquat;
        let totalReliquatAffiche = new Intl.NumberFormat('fr-FR').format(item.totalReliquat);
        let totalAttendu=item.total_attendu;
        let totalAttenduAffiche = new Intl.NumberFormat('fr-FR').format(item.total_attendu);
        let restanttotal=item.total_attendu - item.totalVerse;
        let restanttotalAffiche = new Intl.NumberFormat('fr-FR').format(item.total_attendu - item.totalVerse);
        series.push(Number(verse));
        labels.push(ucfirst(item.detenteur));

        console.log('Series pour le chart :', series);

        // couleur correspondante
        let color = colors[index % colors.length]; // pour éviter les débordements si plus de couleurs

        lignes += `<div class="col-sm-6">
                    <div class="bg-body p-3 rounded">
                      <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                          <span class="p-1 d-block" style="background-color:${color}; border-radius:50%;">
                            <span class="visually-hidden">Color</span>
                          </span>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <p class="mb-0">${ucfirst(item.detenteur)}</p>
                        </div>
                      </div>
                      <h6 class="mb-0">${verseAffiche} FCFA <small class="text-muted" style="color:red !important;font-weight:bold;"><i class="ti ti-chevrons-up"></i>${totalReliquatAffiche} FCFA</small></h6>
                      <h6 class="mb-0">${totalAttenduAffiche} FCFA <small class="text-muted" style="color:red !important;font-weight:bold;"><i class="ti ti-chevrons-up"></i>${restanttotalAffiche} FCFA</small></h6>

                      </div>
                  </div>`;
    });

    $('#listeDetenteurs').html(lignes);

    
        // 🔄 Mise à jour du graphique
        if (chart !== null) {
            chart.destroy(); // détruire l'ancien graphe
        }
    // Création du donut ApexCharts
    var options = {
        chart: {
            height: 320,
            type: 'donut'
        },
        series: series,
       // series: [27, 23],
        labels: labels,
        colors: colors,
        fill: {
        opacity: [1, 1, 1, 0.3]
      },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    labels: {
                        show: true,
                        name: { show: true },
                        value: { 
                            show: true,
                            formatter: function(val) {
                                return new Intl.NumberFormat('fr-FR').format(val) + " FCFA";
                            }
                        }
                    }
                }
            }
        },
       /* legend: {
            position: 'bottom'
        }*/
    };

    chart = new ApexCharts(document.querySelector("#total-income-graph1"), options);
    chart.render();

    /*var chart2 = new ApexCharts(document.querySelector("#total-income-graph2"), options);

    chart2.render();*/
});
}



</script>
<script>
  var chart2 = null;
$.getJSON('/getfluxsortants_pardetenteurs', function(data) {

    let series = [];
    let labels = [];
    let colors = ['#4680FF', '#E58A00', '#F43F5E', '#10B981', '#8B5CF6'];

    // Totaux globaux (total global du mois)
    totalGlobal = data.totalGlobal;

   // $('#mois').html("Mois En Cours : " + totauxGlobaux.moisTexte);
    $('#mois2').html("Mois En Cours : " + data.moisTexte);

    // Construction de la liste + remplissage donut
    let lignes = '';

    data.parDetenteur.forEach(function(item, index) {

        let verse = Number(item.totalVerse);
        let verseAffiche = new Intl.NumberFormat('fr-FR').format(verse);

        // Remplissage du donut
        series.push(verse);
        labels.push(ucfirst(item.detenteur));

        let color = colors[index % colors.length];

        // Ici on affiche UNIQUEMENT le total dépensé pour ce détenteur
        lignes += `
        <div class="col-sm-6">
            <div class="bg-body p-3 rounded">
              <div class="d-flex align-items-center mb-2">
                <div class="flex-shrink-0">
                  <span class="p-1 d-block" style="background-color:${color}; border-radius:50%;">
                    <span class="visually-hidden">Color</span>
                  </span>
                </div>
                <div class="flex-grow-1 ms-2">
                  <p class="mb-0">${ucfirst(item.detenteur)}</p>
                </div>
              </div>

              <h6 class="mb-0">${verseAffiche} FCFA</h6>
            </div>
        </div>`;
    });

    $('#listeDetenteurssortants').html(lignes);
    $("#totalfluxsortant").html("<h6>Total Flux Sortants Mois en cours : " + new Intl.NumberFormat('fr-FR').format(totalGlobal) + " FCFA</h6>");

    // Donut ApexCharts
    var options = {
        chart: {
            height: 320,
            type: 'donut'
        },
        series: series,
        labels: labels,
        colors: colors,
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    labels: {
                        show: true,
                        name: { show: true },
                        value: { 
                            show: true,
                            formatter: function(val) {
                                return new Intl.NumberFormat('fr-FR').format(val) + " FCFA";
                            }
                        }
                    }
                }
            }
        }
    };

   

     chart2 = new ApexCharts(document.querySelector("#total-income-graph2"), options);
    chart2.render();

});


function chargerFluxSortants(mois) {
    $.getJSON('/getfluxsortants_pardetenteurs', { mois: mois }, function(data) {

        let series = [];
        let labels = [];
        let colors = ['#4680FF', '#E58A00', '#F43F5E', '#10B981', '#8B5CF6'];

        $('#mois2').html("Mois Sélectionné : " + data.moisTexte);
        $("#totalfluxsortant").html(
            "<h6>Total Flux Sortants : " + 
            new Intl.NumberFormat('fr-FR').format(data.totalGlobal) + 
            " FCFA</h6>"
        );

        // Liste + préparation du donut
        let lignes = "";

        data.parDetenteur.forEach(function(item, index) {
            let verse = Number(item.totalVerse);
            let verseAffiche = new Intl.NumberFormat('fr-FR').format(verse);

            series.push(verse);
            labels.push(ucfirst(item.detenteur));

            let color = colors[index % colors.length];

            lignes += `
            <div class="col-sm-6">
                <div class="bg-body p-3 rounded">
                  <div class="d-flex align-items-center mb-2">
                    <span class="p-1 d-block" style="background-color:${color}; border-radius:50%;"></span>
                    <p class="mb-0 ms-2">${ucfirst(item.detenteur)}</p>
                  </div>
                  <h6 class="mb-0">${verseAffiche} FCFA</h6>
                </div>
            </div>`;
        });

        $('#listeDetenteurssortants').html(lignes);

        // 🔄 Mise à jour du graphique
        if (chart2 !== null) {
            chart2.destroy(); // détruire l'ancien graphe
        }

        var options = {
            chart: {
                height: 320,
                type: 'donut'
            },
            series: series,
            labels: labels,
            colors: colors,
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        labels: {
                            show: true,
                            name: { show: true },
                            value: { 
                                show: true,
                                formatter: val => 
                                  new Intl.NumberFormat('fr-FR').format(val) + " FCFA"
                            }
                        }
                    }
                }
            }
        };

        chart2= new ApexCharts(
            document.querySelector("#total-income-graph2"),
            options
        );

        chart2.render();
    });
}
  </script>
<script>




let chartratio= null;

//fetch('/progressionpardetenteur')
fetch('/progressionpardetenteurameliore')
  .then(res => res.json())
  .then(response => {
    const categories = response.moisList.map(m => {
      const [year, month] = m.split('-');
      return new Date(year, month - 1).toLocaleString('fr-FR', { month: 'short' });
    });

    const series = response.data.map(d => ({
      name: d.detenteur,
      data: d.data.map(x => x.ratio)
    }));

    const options = {
      chart: { type: 'area', height: 350 },
      dataLabels: { enabled: true },
      stroke: { curve: 'smooth' },
      title: { text: 'Progression du ratio de paiement par détenteur', align: 'center' },
      xaxis: {
        categories,
        title: { text: 'Mois' }
      },
      yaxis: {
        title: { text: 'Taux de paiement (%)' },
        max: 100
      },
      series
    };

    chartratio = new ApexCharts(document.querySelector("#customer-rate-graph2"), options);
    chartratio.render();
  });

//let chartSortants = null; // on garde une instance globale du chart

</script>
<script>
let chartsomtotaldenomi;
fetch('/montantparmaisonmoiscourant')
  .then(res => res.json())
  .then(response => {
    const categories = response.map(item => item.maison);

    const totalVerse = response.map(item => item.sommeTotalVerse);
    const totalRelicat = response.map(item => item.sommeTotalRelicat);
    const montantAttendu = response.map(item => item.montantAttendu); // ✅ Nouveau champ ajouté

    const options = {
      chart: { type: 'bar', height: 350 },
      plotOptions: {
  
        bar: { horizontal: false, columnWidth: '55%',
 dataLabels: {
            position: 'top' // affichage en haut de chaque barre
          }

         }
      
      },
      dataLabels: { enabled: true ,
        /*formatter: function (val) {
        //  return val + ' 📍'; // équivalent de formatter: '{c} 📍'     formatter: '{c} 📍'
         return opts.seriesIndex === 0 ? val + ' 📍' : '';
        },*/
        formatter: function (val,opts) {
          // Afficher le label seulement pour la première série (Montant Attendu)
          return opts.seriesIndex === 0 ? val + ' 📍' : '';
        },
        offsetY: -20,
        style: {
          fontSize: '14px',
          fontWeight: 'bold',
          colors: ['#000']
        }


      },
      stroke: { show: true, width: 2, colors: ['transparent'] },
      title: { text: 'Sommes totales par Denomination (mois en cours) Pour Tous les Detenteurs', align: 'center' },
      xaxis: {
        categories,
        title: { text: 'Denomination Patrimoine' }
      },
      yaxis: {
        title: { text: 'Montant (FCFA)' }
      },
        tooltip: {
          y: {
            formatter: function (val) {
              return val.toLocaleString() + ' FCFA';
            }
          }
        },
      series: [
         { name: 'Montant Attendu', data: montantAttendu },
          { name: 'Total Versé', data: totalVerse },
          { name: 'Total Relicat', data: totalRelicat }
      ]
    };

    chartsomtotaldenomi = new ApexCharts(document.querySelector("#customer-rate-graph4"), options);
    chartsomtotaldenomi.render();
  });

</script>

<script>
fetch('/top10locatairesannuel') // URL de ton endpoint
    .then(res => res.json())
    .then(data => {
        // Récupération des locataires et de leurs ratios
        const locataires = data.top10.map(l => l.locataire);
        const ratios = data.top10.map(l => l.ratio);

        // Configuration du graphique
        var options = {
            chart: {
                type: 'bar',
                height: 400
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        position: 'right'
                    }
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val + "%";
                }
            },
            series: [{
                name: 'Taux de paiement (%)',
                data: ratios
            }],
            xaxis: {
                categories: locataires,
                title: {
                    text: 'Ratio de paiement (%)'
                }
            },
            colors: function({ value }) {
                if (value >= 90) return '#28a745'; // vert
                if (value >= 70) return '#ffc107'; // orange
                return '#dc3545'; // rouge
            },
            title: {
                text: 'Top 10 des locataires les plus ponctuels',
                align: 'center'
            }
        };

        // Rendu du graphique
        var charttp10 = new ApexCharts(document.querySelector("#top10-graph"), options);
        charttp10.render();
    });
</script>
<script>
  let chartTOP10locataires = null;
  var month=document.querySelector("#filter-datetop10").value;
  var detenteurId=document.querySelector("#filter-detenteur").value;
fetch('/top10locatairesannuel')
// fetch(`/top10locatairesannuelpardetenteur?id_detenteur=${detenteurId}&mois=${month}`)
  .then(res => res.json())
  .then(response => {
    const locataires = response.top10.map(l => l.locataire);
    const ratios = response.top10.map(l => l.ratio);

    const options = {
      chart: { type: 'bar', height: 400 },
      plotOptions: {
        bar: {
          horizontal: true,
          distributed: true, // couleur différente par locataire
          dataLabels: { position: 'right' }
        }
      },
      dataLabels: {
        enabled: true,
        formatter: val => val + '%',
        style: { colors: ['#000'] }
      },
      title: {
        text: `Top 10 des locataires les plus réguliers (${response.periode})`,
        align: 'center'
      },
      xaxis: {
        categories: locataires,
        title: { text: 'Locataires' }
      },
      yaxis: {
        title: { text: 'Taux de paiement (%)' },
        max: 100
      },
      series: [{
        name: 'Taux de paiement',
        data: ratios
      }],
      colors: [
        '#28a745', // vert
        '#66bb6a',
        '#81c784',
        '#a5d6a7',
        '#c8e6c9',
        '#ffd54f',
        '#ffb74d',
        '#ff9800',
        '#ef5350',
        '#e53935'
      ]
    };

    chartTOP10locataires = new ApexCharts(document.querySelector("#customer-rate-graph3"), options);
    chartTOP10locataires.render();
  })
  .catch(error => {
    console.error("Erreur lors du chargement du graphique :", error);
  });

  $('#filter-detenteur').select2({
  placeholder: "Filtrer par détenteur",
  data: [{ id: '', text: 'Tous' }],
  ajax: {
    url: '/liste-detenteurs',
    dataType: 'json',
    processResults: function (data) {
      return {
        results: data.map(d => ({ id: d.id, text: d.nom.charAt(0).toUpperCase() + d.nom.slice(1).toLowerCase() }))
      };

    
    }
  }
});



  $('#filter-detenteurdenomi').select2({
  placeholder: "Filtrer par détenteur",
  ajax: {
    url: '/liste-detenteurs',
    dataType: 'json',
    processResults: function (data) {
      return {
        results: data.map(d => ({ id: d.id, text: d.nom.charAt(0).toUpperCase() + d.nom.slice(1).toLowerCase() }))
      };
    }
  }
});

$('#filter-detenteur').on('change', function () {

/*var lastDateStrvers=document.querySelector("#filter-datetop10").value;
  //alert(this.value);
  loadChartSecond(this.value,lastDateStrvers);*/
  loadChart(this.value);
});


$('#filter-detenteurdenomi').on('change', function () {

  //alert(this.value);
 // loadChartmontantotalversepardenomi(this.value);

 var lastDateStrvers=$("#filter-date").val();
 var detenteur=this.value;
loadChartmontantotalversepardenomiparam(detenteur,lastDateStrvers);
 

});


// Fonction pour charger les données du graphique
function loadChartmontantotalversepardenomipre(detenteurId = '') {

//fetch(`/top10locatairesannuelpardetenteur?id_detenteur=${detenteurId}`)
fetch(`/montantparmaisonmoiscourantpardetenteur?id_detenteur=${detenteurId}`)
  .then(res => res.json())
  .then(response => {

    const data = response.resultats; // ✅ Récupère le tableau
    const categories = data.map(item => item.maison);

    const totalVerse = data.map(item => item.sommeTotalVerse);
    const totalRelicat = data.map(item => item.sommeTotalRelicat);

    const options = {
      chart: { type: 'bar', height: 350 },
      plotOptions: {
  
        bar: { horizontal: false, columnWidth: '55%',
 dataLabels: {
            position: 'top' // affichage en haut de chaque barre
          }

         }
      
      },
      dataLabels: { enabled: true ,
        formatter: function (val) {
          return val + ' 📍'; // équivalent de formatter: '{c} 📍'     formatter: '{c} 📍'
        },
        offsetY: -20,
        style: {
          fontSize: '14px',
          fontWeight: 'bold',
          colors: ['#000']
        }


      },
      stroke: { show: true, width: 2, colors: ['transparent'] },
      title: { text: `Sommes totales par Denomination (mois en cours) Pour ${response.detenteur}`, align: 'center' },
      xaxis: {
        categories,
        title: { text: 'Denomination Patrimoine' }
      },
      yaxis: {
        title: { text: 'Montant (FCFA)' }
      },
      series: [
        { name: 'Total Versé', data: totalVerse },
        { name: 'Total Relicat', data: totalRelicat }
      ]
    };

  if (chartsomtotaldenomi) chartsomtotaldenomi.destroy();
   chartsomtotaldenomi = new ApexCharts(document.querySelector("#customer-rate-graph4"), options);
    chartsomtotaldenomi.render();
  });

}

function loadChartmontantotalversepardenomi(detenteurId = '') {

  fetch(`/montantparmaisonmoiscourantpardetenteur?id_detenteur=${detenteurId}`)
    .then(res => res.json())
    .then(response => {

      const data = response.resultats; // ✅ Récupère le tableau
      const categories = data.map(item => item.maison);

      const totalVerse = data.map(item => item.sommeTotalVerse);
      const totalRelicat = data.map(item => item.sommeTotalRelicat);
      const montantAttendu = data.map(item => item.montantAttendu); // ✅ Nouveau champ ajouté

      const options = {
        chart: { type: 'bar', height: 350 },
        plotOptions: {
          bar: { 
            horizontal: false, 
            columnWidth: '55%',
            dataLabels: { position: 'top' } // affichage en haut de chaque barre
          }
        },
        dataLabels: { 
          enabled: true,
          formatter: function (val) {
            return val.toLocaleString() + ' 📍'; // format avec séparateur de milliers
          },
          offsetY: -20,
          style: {
            fontSize: '13px',
            fontWeight: 'bold',
            colors: ['#000']
          }
        },
        stroke: { show: true, width: 2, colors: ['transparent'] },
        title: { 
          text: `Sommes totales par Dénomination (mois en cours) pour ${response.detenteur}`, 
          align: 'center' 
        },
        xaxis: {
          categories,
          title: { text: 'Dénomination du Patrimoine' }
        },
        yaxis: {
          title: { text: 'Montant (FCFA)' }
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val.toLocaleString() + ' FCFA';
            }
          }
        },
        series: [
          { name: 'Montant Attendu', data: montantAttendu },
          { name: 'Total Versé', data: totalVerse },
          { name: 'Total Relicat', data: totalRelicat }
        ]
      };

      if (chartsomtotaldenomi) chartsomtotaldenomi.destroy();
      chartsomtotaldenomi = new ApexCharts(document.querySelector("#customer-rate-graph4"), options);
      chartsomtotaldenomi.render();
    });
}


function loadChartmontantotalversepardenomiparam(detenteurId = '', mois = '') {

  // Construire l'URL avec les paramètres
  let url = `/montantparmaisonmoiscourantpardetenteurparam?id_detenteur=${detenteurId}`;
  if (mois) {
    url += `&mois=${mois}`; // Ajouter le mois si fourni
  }

  fetch(url)
    .then(res => res.json())
    .then(response => {

      const data = response.resultats; // Récupère le tableau
      const categories = data.map(item => item.maison);

      const totalVerse = data.map(item => item.sommeTotalVerse);
      const totalRelicat = data.map(item => item.sommeTotalRelicat);
      const montantAttendu = data.map(item => item.montantAttendu); // Nouveau champ ajouté

      const options = {
        chart: { type: 'bar', height: 350 },
        plotOptions: {
          bar: { 
            horizontal: false, 
            columnWidth: '55%',
            dataLabels: { position: 'top' }
          }
        },
        dataLabels: { 
          enabled: true,
         /* formatter: function (val) {
            return val.toLocaleString() + ' 📍'; // format avec séparateur de milliers
          },*/
           formatter: function (val,opts) {
          // Afficher le label seulement pour la première série (Montant Attendu)
          return opts.seriesIndex === 0 ? val + ' 📍' : ''+val;
        },
          offsetY: -20,
          style: {
            fontSize: '13px',
            fontWeight: 'bold',
            colors: ['#000']
          }
        },
        stroke: { show: true, width: 2, colors: ['transparent'] },
        title: { 
          text: `Sommes totales par Dénomination pour ${response.detenteur} (${mois || 'mois en cours'})`, 
          align: 'center' 
        },
        xaxis: {
          categories,
          title: { text: 'Dénomination du Patrimoine' }
        },
        yaxis: {
          title: { text: 'Montant (FCFA)' }
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val.toLocaleString() + ' FCFA';
            }
          }
        },
        series: [
          { name: 'Montant Attendu', data: montantAttendu },
          { name: 'Total Versé', data: totalVerse },
          { name: 'Total Relicat', data: totalRelicat }
        ]
      };

      if (chartsomtotaldenomi) chartsomtotaldenomi.destroy();
      chartsomtotaldenomi = new ApexCharts(document.querySelector("#customer-rate-graph4"), options);
      chartsomtotaldenomi.render();
    });
}


function loadChartSecond(detenteurId = "", month = "") {

    fetch(`/top10locatairesannuelpardetenteur?id_detenteur=${detenteurId}&mois=${month}`)
        .then(res => res.json())
        .then(response => {

            const locataires = response.top10.map(l => l.locataire);
            const ratios = response.top10.map(l => l.ratio);

            const options = {
                chart: { type: 'bar', height: 400 },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        distributed: true
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: v => v + '%'
                },
                title: {
                    text: `Top 10 locataires les plus réguliers (${response.periode} ${response.annee}) – ${response.detenteur}`,
                    align: 'center'
                },
                xaxis: { categories: locataires },
                yaxis: { max: 100 },
                series: [{
                    name: 'Taux de paiement',
                    data: ratios
                }]
            };

            if (chart) chart.destroy();

            chart = new ApexCharts(
                document.querySelector("#customer-rate-graph3"),
                options
            );
            chart.render();
        });
}

// Fonction pour charger les données du graphique
function loadChart(detenteurId = '') {
var chart
fetch(`/top10locatairesannuelpardetenteur?id_detenteur=${detenteurId}`)
     .then(res => res.json())
  .then(response => {
    const locataires = response.top10.map(l => l.locataire);
    const ratios = response.top10.map(l => l.ratio);

    const options = {
      chart: { type: 'bar', height: 400 },
      plotOptions: {
        bar: {
          horizontal: true,
          distributed: true, // couleur différente par locataire
          dataLabels: { position: 'right' }
        }
      },
      dataLabels: {
        enabled: true,
        formatter: val => val + '%',
        style: { colors: ['#000'] }
      },
      title: {
        text: `Top 10 des locataires les plus réguliers (${response.periode} ${response.annee}) Pour ${response.detenteur}`,
        align: 'center'
      },
      xaxis: {
        categories: locataires,
        title: { text: 'Locataires' }
      },
      yaxis: {
        title: { text: 'Taux de paiement (%)' },
        max: 100
      },
      series: [{
        name: 'Taux de paiement',
        data: ratios
      }],
      colors: [
        '#28a745', // vert
        '#66bb6a',
        '#81c784',
        '#a5d6a7',
        '#c8e6c9',
        '#ffd54f',
        '#ffb74d',
        '#ff9800',
        '#ef5350',
        '#e53935'
      ]
    };
if (chartTOP10locataires) chartTOP10locataires.destroy();
    chartTOP10locataires = new ApexCharts(document.querySelector("#customer-rate-graph3"), options);
    chartTOP10locataires.render();
  })
  .catch(error => {
    console.error("Erreur lors du chargement du graphique :", error);
  });


}

// Charger par défaut sans filtre
//loadChart();

</script>
<script>
 /*var options8 = {
      chart: {
        height: 320,
        type: 'donut'
      },
      series: [27, 23],
      colors: ['#4680FF', '#E58A00'],
      labels: ['Total income', 'Total rent'],
      fill: {
        opacity: [1, 1, 1, 0.3]
      },
      legend: {
        show: false
      },
      plotOptions: {
        pie: {
          donut: {
            size: '65%',
            labels: {
              show: true,
              name: {
                show: true
              },
              value: {
                show: true
              }
            }
          }
        }
      },
      dataLabels: {
        enabled: false
      },
      responsive: [
        {
          breakpoint: 480,
          options: {
            plotOptions: {
              pie: {
                donut: {
                  size: '65%',
                  labels: {
                    show: true
                  }
                }
              }
            }
          }
        }
      ]
    };
    var chart = new ApexCharts(document.querySelector('#total-income-graph1'), options8);
    chart.render();*/
 


 $.get('/nmbredetenteurs/', function (data) {
            // Populate the modal form with the fetched data
           // alert(data.libelefamille);
         console.log(data.length);
        $("#detenteurs").html(""+data.length+",0");
       // alert(data.length);

        });

 $.get('/nmbrelocataires/', function (data) {
            // Populate the modal form with the fetched data
           // alert(data.libelefamille);
         console.log(data.length);
        $("#locataires").html(""+data.length+",0");

        });


 $.get('/nmbredispoappart/', function (data) {
            // Populate the modal form with the fetched data
           // alert(data.libelefamille);
         console.log(data.length);
        $("#nmbreappartdispo").html(""+data.length+",0");

        });

</script>
<script>
   let lastDateStrvers = "";
    const fpvers = flatpickr("#filter-date", {
      //mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      static: true,
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      defaultDate: new Date(),
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
          var detenteur= document.getElementById('filter-detenteurdenomi').value;
          //alert(lastDateStrvers+" "+detenteur);
          //alert("Date sélectionnée : " + lastDateStrvers);
         // document.getElementById('valeur').textContent = lastDateStrvers;
loadChartmontantotalversepardenomiparam(detenteur,lastDateStrvers);
          
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

   

     let lastDateStrversfluxsortant = "";
    const fpfluxsortants = flatpickr("#filter-datefluxsortant", {
      //mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      static: true,
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      defaultDate: new Date(),
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
          chargerFluxSortants(dateStr);
          lastDateStrversfluxsortant = dateStr;
         // document.getElementById('valeur').textContent = lastDateStrversfluxsortant;
        }
      },
      onClose(selectedDates, dateStr, instance) {
        // si seule une date sélectionnée, forcer la valeur après fermeture
        if (selectedDates.length === 1) {
          // Méthode sûre : setDate avec la valeur déjà gardée
          // Utilisation d'un petit délai pour s'assurer que flatpickr a fini ses propres handlers
          setTimeout(() => {
            if (lastDateStrversfluxsortant) {
              // setDate accepte string(s) séparées par " to "
              instance.setDate(lastDateStrversfluxsortant, true); // true => triggerChange
              document.getElementById('valeur').textContent = lastDateStrversfluxsortant;
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
    window.fpfluxsortants = fpfluxsortants;



     let lastDateStrversentrant = "";
    const fpfluxentrants = flatpickr("#filter-datefluxentrant", {
      //mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      static: true,
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      defaultDate: new Date(), // ✅ Par défaut : mois actuel
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
          chargerFluxEntrants(dateStr);
          lastDateStrversentrant = dateStr;
          //document.getElementById('valeur').textContent = lastDateStrversentrant;
        }
      },
      onClose(selectedDates, dateStr, instance) {
        // si seule une date sélectionnée, forcer la valeur après fermeture
        if (selectedDates.length === 1) {
          // Méthode sûre : setDate avec la valeur déjà gardée
          // Utilisation d'un petit délai pour s'assurer que flatpickr a fini ses propres handlers
          setTimeout(() => {
            if (lastDateStrversentrant) {
              // setDate accepte string(s) séparées par " to "
              instance.setDate(lastDateStrversentrant, true); // true => triggerChange
             // document.getElementById('valeur').textContent = lastDateStrversentrant;
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
    window.fpfluxentrants = fpfluxentrants;





   let lastDateStrtop10 = "";
    const fptop10 = flatpickr("#filter-datetop10", {
      //mode: "range",
      dateFormat: "Y-m",      // valeur réelle
      altInput: true,
      altFormat: "F Y",      // affichage lisible
      locale: "fr",
      static: true,
      closeOnSelect: false,  // important : ne pas fermer au 1er clic
      defaultDate: new Date(),
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
          lastDateStrtop10 = dateStr;
         // document.getElementById('valeur').textContent = lastDateStrtop10;
        }
      },
      onClose(selectedDates, dateStr, instance) {
        // si seule une date sélectionnée, forcer la valeur après fermeture
        if (selectedDates.length === 1) {
          // Méthode sûre : setDate avec la valeur déjà gardée
          // Utilisation d'un petit délai pour s'assurer que flatpickr a fini ses propres handlers
          setTimeout(() => {
            if (lastDateStrtop10) {
              // setDate accepte string(s) séparées par " to "
              instance.setDate(lastDateStrtop10, true); // true => triggerChange
             // document.getElementById('valeur').textContent = lastDateStrtop10;
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
    window.fptop10 = fptop10;

</script>

  </body>
  <!-- [Body] end -->
</html>
