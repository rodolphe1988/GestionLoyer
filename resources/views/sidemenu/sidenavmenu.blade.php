<style>
  .pc-sidebar {
    background: white !important;
  }
</style>
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div style="text-align:center;" >
      <img src="{{ asset('assets/images/imagelogo.png') }}" class="img-fluid logo-lg" alt="logo" />
</div>
    <div class="m-header" style="display:none;" >
      <a href="{{ route('index') }}" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <!--<img src="{{ asset('assets/images/logo-dark.png') }}" class="img-fluid logo-lg" alt="logo" /> -->





        <!-- <img src="{{ asset('assets/images/logosvgsec.svg') }}" class="img-fluids logo-lgs" alt="logo"  style="height: 133px;" />-->
        <span class="badge bg-light-success rounded-pill ms-2 theme-version"></span>
      </a>
    </div>
    <div class="navbar-content">
      <div class="card pc-user-card" style="background: #2f63ff;">
        <div class="card-body" style="color: white;">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2" style="color: white;">
              <h6 class="mb-0" style="color: white;" >{{ Auth::user()->prenom  }}</h6>
              <small style="color: white;">Utilisateur</small>
            </div>
            <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink" style="background-color: white;">
              <svg class="pc-icon">
                <use xlink:href="#custom-sort-outline"></use>
              </svg>
            </a>
          </div>
          <div class="collapse pc-user-links" id="pc_sidebar_userlink">
            <div class="pt-3">
              <a href="#!" style="color: white;">
                <i class="ti ti-user"></i>
                <span style="color: white;">Mon Compte</span>
              </a>
              <a href="#!" style="color: white;">
                <i class="ti ti-settings"></i>
                <span style="color: white;">Mes Parametres</span>
              </a>
              <a href="#!" style="display:none;">
                <i class="ti ti-lock"></i>
                <span style="color: white;">Lock Screen</span>
              </a>
              <a href="{{ route('logout') }}" style="color: white;">
                <i class="ti ti-power"></i>
                <span style="color: white;">Se Deconnecter</span>
              </a>

            </div>
          </div>
        </div>
      </div>

  @include('menulateral.menu')
     
    </div>
  </div> 
</nav>