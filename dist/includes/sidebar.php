<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SANN JOSE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['pic'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo strtoupper($_SESSION['name']);?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="owner.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Owner
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="stockin.php" class="nav-link">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Stockin
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="stockout.php" class="nav-link">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Stockout
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pos.php" class="nav-link">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Point of Sale
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Maintenance
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="breed.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Breed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="species.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Species</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vaccine.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vaccine</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="appointment.php" class="nav-link">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Appointments
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Consultation
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="report_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Per Day</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="report_city.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Per City/Municipality</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="report_sex.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Per Sex</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="report_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Per Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="settings.php" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>