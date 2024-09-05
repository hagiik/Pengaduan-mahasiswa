

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="container">

	<form>
		<div class="form-group">
			<label>Dari</label>
			<input type="date" name="dari" value="<?= @$_GET['dari'] ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Dari</label>
			<input type="date" name="sampai" value="<?= @$_GET['sampai'] ?>" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary mb-3">Filter</button>
		<button type="submit" class="btn btn-warning mb-3" name="btn" value="cetak" >Cetak</button>
		<a href="<?= base_url('Admin/TanggapanController/laporan') ?>" class="btn btn-info mb-3">Reset</a>
	</form>

	<div class="col-12  mb-4">
	
<table class="table align-middle mb-0 bg-white shadow datatable">
<thead class="bg-light">
  <tr>
	<th scope="col">No</th>
	<th scope="col">Nama</th>
	<th scope="col">Alasan Pengaduan</th>
	<th scope="col">Tgl Melapor</th>
	<th scope="col">jenis</th>
	<th scope="col">Status</th>
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
	  <td><?= $dp['jenis_laporan']; ?></td>
	  <td>
	   <?php
                if ($dp['status'] == 'masuk') {
                  echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
                } elseif ($dp['status'] == 'proses') {
                  echo '<span class="badge badge-primary">Sedang di proses</span>';
                } elseif ($dp['status'] == 'proses lagi') {
                  echo '<span class="badge badge-success">proses sedang di kerjakan</span>';
                } elseif ($dp['status'] == 'selesai') {
                  echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                } elseif ($dp['status'] == 'tolak') {
                  echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
                } elseif ($dp['status'] == 'diterima') {
                  echo '<span class="badge badge-warning">Pengaduan diterima</span>';
                } else {
                  echo '-';
                }
                ?>
	  </td>
	  
	  
	  <td class="text-center">
		
			<?= form_open('Admin/TanggapanController/tanggapan_detail_selesai'); ?>
				<input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
				<button class="btn btn-success" name="selesai">Detail</button>
			<?= form_close(); ?>
	  </td>

	  </tr>
	<?php endforeach; ?>
  </tbody>
</table>

</div>
</div>