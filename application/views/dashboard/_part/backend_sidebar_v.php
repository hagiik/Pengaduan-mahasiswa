<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('User/ProfileController'); ?>">
      <div class="sidebar-brand-icon rotate-n-15">
        <!-- <i class="fas fa-laugh-wink"></i> -->
      </div>
      <div class="sidebar-brand-text mx-3 mt-3">
        <p>Pengaduan FTI Unsera
      </div>
    </a>

    <?php if (
      $this->session->userdata('role')[0]->nama == 'Admin' or $this->session->userdata('role')[0]->nama == 'Staff'
      or $this->session->userdata('role')[0]->nama == 'Sarana' or $this->session->userdata('role')[0]->nama == 'Akademik' or $this->session->userdata('role')[0]->nama == 'Prodi'
    ) : ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin/DashboardController') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      User
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-user"></i>
        <span>Profile</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Profile:</h6>
          <a class="collapse-item" href="<?= base_url('User/ProfileController'); ?>">Profile Saya</a>
          <a class="collapse-item" href="<?= base_url('Auth/ChangePasswordController');  ?>">Ganti Password</a>
        </div>
      </div>
    </li>


    <?php // form pengaduan diakses oleh masyarakat 
      $role = $this->session->userdata('role')[0];
      $permission = json_decode($role->permission);
    ?>

    <?php if ($this->session->userdata('username') && $this->session->userdata('role')[0]->nama == "Mahasiswa") : ?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('mahasiswa/PengaduanController'); ?>"  aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-archive"></i>
          <span>Tulis Pengaduan</span>
        </a>
      </li>
    <?php endif; ?>
    <?php // end form pengaduan diakses oleh masyarakat 
    ?>

    <!-- Divider -->


    <?php // dropdown admin hanya oleh akun admin dan petugas 
    ?>
    <?php if (in_array("pengaduan",$permission)) : ?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-archive"></i>
          <span>Pengaduan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tanggapan:</h6>
            <a class="collapse-item" href="<?= base_url('Admin/TanggapanController'); ?>">Pengaduan Masuk</a>
            <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/tanggapan_diterima'); ?>">Pengaduan Diterima</a>
            <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/tanggapan_proses'); ?>">Pengaduan Proses</a>
            <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/tanggapan_tolak'); ?>">Pengaduan Ditolak</a>
            <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/tanggapan_selesai'); ?>">Pengaduan Selesai</a>
            <a class="collapse-item" href="<?= base_url('Admin/TanggapanController/laporan'); ?>">Laporan Selesai</a>
            <div class="collapse-divider"></div>

          

            

          </div>
        </div>
      </li>

    <?php endif; ?>

    <li class="nav-item">
    <?php if (in_array("petugas",$permission)) : ?>
      <a class="nav-link" href="<?= base_url('Admin/PetugasController'); ?>">
        <i class="fas fa-user-cog"></i>
        <span>Tambah Petugas</span></a>
    <?php endif; ?>
    
    <?php if (in_array("role",$permission)) : ?>
          <a class="nav-link" href="<?= base_url('Admin/RoleController'); ?>">
        <i class="fas fa-user-cog"></i>
          <span>Tambah Role</span></a>
    <?php endif; ?>

    <?php if (in_array("mahasiswa",$permission)) : ?>
          <a class="nav-link" href="<?= base_url('Admin/MahasiswaController'); ?>">
        <i class="fas fa-id-card"></i>
          <span>Lihat Mahasiswa</span></a>
    <?php endif; ?>
    </li>

    <hr class="sidebar-divider">

  
      
    <!-- Nav Item - Logout -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('Auth/LogoutController'); ?>"  data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



  </ul>

  <!-- End of Sidebar -->