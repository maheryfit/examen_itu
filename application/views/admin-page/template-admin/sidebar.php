<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title;?></title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="<?=base_url()?>/assets/back/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/back/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/back/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/back/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/back/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/back/vendors/owl-carousel-2/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?=base_url()?>assets/back/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/back/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/back/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/back/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/back/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/back/images/favicon.png" />

  </head>
  <body>
    <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><a href="<?=site_url("front_controller/logout")?>"><span class="yellow">Log out</a></h5>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?=site_url()?>/admin_controller/aliment">
              <span class="menu-icon">
                <i class="fas fa-bars"></i>
              </span>
              <span class="menu-title">Aliments</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?=site_url()?>/admin_controller/activite">
              <span class="menu-icon">
                <i class="fas fa-futbol"></i>
              </span>
              <span class="menu-title">Activités sportives</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?=site_url()?>/admin_controller/regime">
              <span class="menu-icon">
                <i class="fas fa-utensils"></i>
              </span>
              <span class="menu-title">Régimes</span>
            </a>
          </li>
        </ul>
      </nav>