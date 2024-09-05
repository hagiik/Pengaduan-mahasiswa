<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?= base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/backend/css/sb-admin-2.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/backend/css/timeline.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="<?= base_url() ?>assets/page/img/unsera-logo.ico" />


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:700|Montserrat:200,400,600|Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <!-- Custom styles for this template-->

	<title>Cetak Pengaduan</title>

	<style type="text/css">
		@media print {
		  @page { margin: 0; }
		  body { margin: 1.6cm; }
		}
		
		.table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}
 
.table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}
 
.table1, th, td {
    padding: 8px 20px;
    text-align: center;
}
 
.table1 tr:hover {
    background-color: #f5f5f5;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
	</style>
</head>
<body onload="window.print()">

	<h1 align="center">Laporan Pengaduan</h1>
	<h3 align="center"> Mahasiswa FTI UNSERA </h3>
	<hr>

	<table width="100%" border="2" style="border-collapse: collapse;">
		<thead>
  <tr>
	<th>No</th>
	<th>Nama</th>
	<th>Alasan Pengaduan</th>
	<th>Tgl Melapor</th>
	<th>Status</th>
	<th>Jenis</th>

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
                  echo '<span class="badge badge-warning">Pengaduan di tolak</span>';
                } else {
                  echo '-';
                }
                ?>
	  </td>
	  <td><?= $dp['jenis_laporan']; ?></td>

	  </tr>
	<?php endforeach; ?>
  </tbody>
	</table>

</body>
<script src="<?= base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/backend/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/backend/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/backend/js/demo/chart-pie-demo.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</html>