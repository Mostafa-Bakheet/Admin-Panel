<?php
include_once("C:/xampp/htdocs/medical/admin/general/function.php");
?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?= url("") ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#doctor" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>doctor</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="doctor" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("doctor/add.php")?>">
          <i class="bi bi-circle"></i><span>add doctor</span>
        </a>
      </li>
      <li>
        <a href="<?= url("doctor/list.php")?>">
          <i class="bi bi-circle"></i><span>list doctor</span>
        </a>
      </li>
    </ul>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#doctordates" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>doctor dates</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="doctordates" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("doctor_dates/add.php")?>">
          <i class="bi bi-circle"></i><span>add doctor</span>
        </a>
      </li>
      <li>
        <a href="<?= url("doctor_dates/list.php")?>">
          <i class="bi bi-circle"></i><span>list doctor</span>
        </a>
      </li>
    </ul>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Admin" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("Admin/add.php")?>">
          <i class="bi bi-circle"></i><span>add Admin </span>
        </a>
      </li>
      <li>
        <a href="<?= url("Admin/list.php")?>">
          <i class="bi bi-circle"></i><span>list Admin </span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#User" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="User" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?= url("User/add.php")?>">
          <i class="bi bi-circle"></i><span>add User</span>
        </a>
      </li>
      <li>
        <a href="<?= url("User/list.php")?>">
          <i class="bi bi-circle"></i><span>list User</span>
        </a>
      </li>
    </ul>
  </li>
  <!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
     
      <li>
        <a href="<?= url("tables-data.php")?>">
          <i class="bi bi-circle"></i><span>Data Tables</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= url("users-profile.php")?>">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= url("pages-register.php")?>">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= url("admin/pages-login.php")?>">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= url("pages-error-404.php")?>">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li>


</ul>

</aside><!-- End Sidebar-->