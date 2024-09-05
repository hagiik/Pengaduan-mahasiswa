        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Masuk Baru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan_masuk) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-database fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Masuk Proses</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan_proses) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Laporan Masuk Tolak</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan_ditolak) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ban fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Masuk Diterima</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan_diterima) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php if($_SESSION['role'][0]->id == "1") { ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Petugas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($petugas) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mahasiswa Terdaftar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($mahasiswa) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengaduan Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($pengaduan) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
<!-- 
        <div class="container">
        <div class="col-xl-12 col-md-6 mb-4">
        <table class="table align-middle mb-0 bg-white shadow">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Title</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">John Doe</p>
            <p class="text-muted mb-0">john.doe@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Software engineer</p>
        <p class="text-muted mb-0">IT department</p>
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline">Active</span>
      </td>
      <td>
        <button type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/6.jpg"
              class="rounded-circle"
              alt=""
              style="width: 45px; height: 45px"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">Alex Ray</p>
            <p class="text-muted mb-0">alex.ray@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Consultant</p>
        <p class="text-muted mb-0">Finance</p>
      </td>
      <td>
        <span class="badge badge-primary rounded-pill d-inline"
              >Onboarding</span
          >
      </td>
      
      <td>
        <button
                type="button"
                class="btn btn-link btn-rounded btn-sm fw-bold"
                data-mdb-ripple-color="dark"
                >
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/7.jpg"
              class="rounded-circle"
              alt=""
              style="width: 45px; height: 45px"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">Kate Hunington</p>
            <p class="text-muted mb-0">kate.hunington@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Designer</p>
        <p class="text-muted mb-0">UI/UX</p>
      </td>
      <td>
        <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
      </td>
 
      <td>
        <button
                type="button"
                class="btn btn-link btn-rounded btn-sm fw-bold"
                data-mdb-ripple-color="dark"
                >
          Edit
        </button>
      </td>
    </tr>
  </tbody>
</table>
</div>
        </div> -->
<div class="container">
      <div class="col-xl-12 col-md-6 mb-4">
          <div class="table-responsive">  
        <table class="table align-middle mb-0 bg-white shadow datatable">
          <thead class="bg-light">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alasan Pengaduan</th>
                <th scope="col">Tgl Melapor</th>
                <th scope="col">Jenis</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">Lihat Detail</th> -->
              </tr>
            </thead>
        <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_pengaduan as $dp) : ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><?= $dp['nama']; ?></td>
          <td><?= $dp['alasan']; ?></td>
          <td><?= $dp['tgl_pengaduan']; ?></td>
          <td><?= $dp['jenis_laporan']; ?></td>

          <td>
                            <?php
                if ($dp['status'] == 'masuk') {
                  echo '<span class="badge badge-danger">Menunggu Verifikasi</span>';
                } elseif ($dp['status'] == 'proses') {
                  echo '<span class="badge badge-primary">Sedang diproses</span>';
                } elseif ($dp['status'] == 'proses lagi') {
                  echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                } elseif ($dp['status'] == 'selesai') {
                  echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                } elseif ($dp['status'] == 'tolak') {
                  echo '<span class="badge badge-dark">Pengaduan di tolak</span>';
                } elseif ($dp['status'] == 'diterima') {
                  echo '<span class="badge badge-warning">Pengaduan diterima</span>';
                } else {
                  echo '-';
                }
                ?>
          </td>

          
          <!-- <td class="text-center">
            
			<?= form_open('Admin/TanggapanController/tanggapan_detail_selesai'); ?>
   
									<input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
									<button class="btn btn-success" name="terima">Lihat Detail</button>
                  
								<?= form_close(); ?>
          </td> -->

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  </div>