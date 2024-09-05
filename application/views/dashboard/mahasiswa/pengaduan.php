<style type="text/css">

</style>
<!-- Begin Page Content -->
<div class="container-fluid"> 

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?php if ($this->session->flashdata('msg')) { ?>
    <?= $this->session->flashdata('msg'); ?>
  <?php } ?>
  <div class=" row">
    <div class="card col-12 shadow">
      <?= form_open_multipart('mahasiswa/PengaduanController'); ?>

      <div class="form-group">
        <label for="lokasi" class="form-label mt-2">Judul Pengaduan</label>
        <input type="text" name="alasan" class="form-control" id="alasan" placeholder="Judul Pengaduan">
      </div>
      <div class="form-group">
        <label for="jenis_laporan">Jenis Pengaduan <a href="<?= base_url('blog/carapengaduan') ?>">Penjelasan Tentang Jenis Pengaduan</a></label>
        <select class="form-control form-select" row="10" aria-label="form-select-lg example" id="jenis_laporan" name="jenis_laporan" required>
          <option selected>Pilih Jenis Pengaduan</option>
          <?php foreach($role as $item) { ?>
          <option value="<?= $item->nama ?>"><?= $item->nama ?></option>
          <?php } ?>
          <option value="lainnya">lainnya</option>
        </select>
      </div>
      <div class="form-group">
        <label for="foto">Upload Foto</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="foto" name="foto">
          <label class="custom-file-label" for="foto"> Choose file</label>
        </div>
      </div>

      <div class=" form-group">
        <label for="isi_laporan">Isi Pengaduan</label>
        <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control" placeholder="Masukan Pengaduan" required></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-info">Submit</button>
      </div>
      <?php form_close(); ?>


    </div>
  </div>

  <!-- Page Heading -->
  <h1 class="h3 mb-4 mt-5 text-gray-800">Data Pengaduan</h1>

  <div class="table-responsive card shadow">
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
          <th scope="col">Aksi</th>
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
            </td>
            <td><?= $dp['jenis_laporan']; ?></td>

            <td class="text-center">

              <a href="<?= base_url('mahasiswa/PengaduanController/tanggapan_detail_selesai?id=' . $dp['id_pengaduan']) ?>" role="button" class="btn btn-success"><i class="fas fa-fw fa-eye"></i></a>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail : <?= $dp['status'] == "0" ? "Pending" : $dp['status'] ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="row text-center">
                        <div class="col">
                          Proses
                        </div>
                        <div class="col">
                          Selesai
                        </div>
                      </div>

                      <div class="progress">
                        <?php if ($dp['status'] == "proses") { ?>
                          <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php } ?>
                        <?php if ($dp['status'] == "selesai") { ?>
                          <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php } ?>
                      </div>

                      <div class="text-center my-3">Tanggapan</div>
                      <hr>
                      <?php
                      foreach ($dp['tanggapan'] as $item) {
                        echo "<div>$item->tanggapan</div>";
                      } ?>
                    </div>
                    <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
                  </div>
                </div>
              </div>

            </td>

            <?php if ($dp['status'] == 'masuk') : ?>
              <td>
                <a href="<?= base_url('mahasiswa/PengaduanController/pengaduan_batal/' . $dp['id_pengaduan']) ?>" class="btn btn-warning">Hapus</a>

                 <a href="<?= base_url('mahasiswa/PengaduanController/edit/' . $dp['id_pengaduan']) ?>" class="btn btn-info">Edit</a> 
              </td>

            <?php else : ?>
              <td><small>Tidak ada aksi</small></td>
            <?php endif; ?>


          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
</div>
<!-- /.container-fluid -->