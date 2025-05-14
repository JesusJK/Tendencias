<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" >
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ route('autores.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Autores
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categorias.index') }}" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
              <p>
                Categorias
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('clasificaciones.index') }}" class="nav-link">
            <i class="nav-icon fas fa-list-ol"></i>
              <p>
                Clasificaciones
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('estantes.index') }}" class="nav-link">
            <i class="nav-icon fas fa-boxes"></i>
              <p>
                Estantes
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('materiales.index') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Materiales
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
        </ul>
                
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>