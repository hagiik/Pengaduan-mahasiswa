<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<?php if ($this->session->flashdata('msg')) { ?>
    <?= $this->session->flashdata('msg'); ?>
  <?php } ?>
  
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
        <th scope="col">Status</th>
        <th scope="col">jenis</th>
        <th scope="col">Lihat Detail</th>

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

          <td>
            <?php
if ($dp['status'] == 'masuk') {
	echo '<span class="badge badge-danger">Menunggu Verifikasi</span>';
} elseif ($dp['status'] == 'proses') {
	echo '<span class="badge badge-primary">Sedang di proses</span>';
} elseif ($dp['status'] == 'selesai') {
	echo '<span class="badge badge-success">Selesai di kerjakan</span>';
} elseif ($dp['status'] == 'tolak') {
	echo '<span class="badge badge-dark">Pengaduan di tolak</span>';
} else {
	echo '-';
}
?>
          </td>
          <td><?= $dp['jenis_laporan']; ?></td>
          
          <td class="text-center">
            
			<?= form_open('Admin/TanggapanController/tanggapan_detail'); ?>
									<input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
									<button class="btn btn-success" name="terima">Lihat Detail</button>
									  <a href="<?= base_url('Admin/TanggapanController/edit/' . $dp['id_pengaduan']) ?>" class="btn btn-info">Edit</a> 
                    <?= form_close(); ?>
          </td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    </div>
  </div>