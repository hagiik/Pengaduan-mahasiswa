<!-- Begin Page Content -->
<div class="container-fluid mb-2">

  <!-- Page Heading -->
  <a onclick="history.back()" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



  <div class="card no-border mb-3 col-lg-12 shadow">
    <div class="justify-content-center">
      <div class="">
        <h3 class="mt-2 mb-2"></h3>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-4 text-center">
        <?php if($data_pengaduan['foto'] == "") { ?>
        <h3>Tidak ada Gambar</h3>
        <?php } else { ?>
          <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['foto'] ?>" alt="Responsive image" class="img-fluid mt-2 mb-2" width="350" height="250">
        <?php } ?>
      </div>
  
      <div class="col-md-8 mb-5">
        <div class="card-body">
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-4 ">Tanggal Pengaduan</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="floatingInputDisabled" value=" <?= $data_pengaduan['tgl_pengaduan']; ?>" floatingInputDisabled" disabled>
              </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-4 ">Alasan Pengaduan</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="floatingInputDisabled" value=" <?= $data_pengaduan['alasan']; ?>" disabled>
              </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
              <div class="col-sm-8">
              <?php
if ($dp['status'] == 'masuk') {
	echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
} elseif ($dp['status'] == 'proses') {
	echo '<span class="badge badge-primary">Sedang di proses</span>';
} elseif ($dp['status'] == 'diterima') {
  echo '<span class="badge badge-warning">Sudah Diterima</span>';
} elseif ($dp['status'] == 'selesai') {
	echo '<span class="badge badge-success">Selesai di kerjakan</span>';
} elseif ($dp['status'] == 'tolak') {
	echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
} else {
	echo '-';
}
?>
              </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Laporan</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="floatingInputDisabled" value=" <?= $data_pengaduan['jenis_laporan']; ?>" disabled>
              </div>
          </div>
          <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-4 col-form-label ">Isi Laporan</label>
              <div class="col-sm-8">
              <textarea class="form-control color-light" placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 250px" disabled> <?= $data_pengaduan['isi_laporan']; ?></textarea>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>



    <div class="card col-md-12">
      <h4 style="margin-left: 1.2rem; ">History Pengaduan</h4>
      <ul class="timeline-3">
        <li>
          <a>Tanggal pengaduan</a>
          <p href="#!" class="float-end"><?= $data_pengaduan['tgl_pengaduan'] ?></p>
          <p class="fw-bolder mt-2"><?= $data_pengaduan['isi_laporan'] ?></p>
        </li>
        <li>
          <a >Tanggal Dikerjakan</a><br>
          <a href="#!" class="float-end"><?= $data_pengaduan['tgl_tanggapan'] ?></a>
          <p class="mt-2"><?= $data_pengaduan['tanggapan'] ?></p>
        </li>
        <li>
          <a >Tanggal Selesai</a><br>
          <a href="#!" class="float-end"><?= $data_pengaduan['tgl_tanggapan'] ?></a>
          <p class="mt-2"><?= $data_pengaduan['tanggapan'] ?></p>
        </li>
		
      </ul>
    </div>
</div>


        <!-- /.container-fluid