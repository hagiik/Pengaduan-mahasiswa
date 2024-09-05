<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="<?= base_url('mahasiswa/PengaduanController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <?= $this->session->flashdata('msg'); ?>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open_multipart('mahasiswa/PengaduanController/edit/'.$pengaduan['id_pengaduan']); ?>
      <div class="form-group">
        <label for="isi_laporan">Isi Laporan</label>
        <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control" placeholder="Masukan Pengaduan" value="<?= $pengaduan['isi_laporan'] ?>"><?= $pengaduan['isi_laporan'] ?></textarea>
      </div>

      <div class="form-group">
      <label for="jenis_laporan">Jenis Laporan</label>
      <select class="form-select custom-select" row="10" aria-label="form-select-lg example" id="jenis_laporan" name="jenis_laporan" value="<?= $pengaduan['jenis_laporan'] ?>" required>
            <option selected>Pilih Jenis Laporan</option>
            <?php foreach($role as $item) { ?>
          <option value="<?= $item->nama ?>"><?= $item->nama ?></option>
          <?php } ?>
            <!-- <option value="Akademik">Akademik</option>
            <option value="Sarana">Sarana </option>
            <option value="Prodi">Prodi</option> -->
            <option value="lainnya">lainnya</option>
      </select>
      </div>



      <div class="form-group">
        <label for="foto">Upload Foto</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="foto" name="foto">
          <label class="custom-file-label" for="foto">Choose file</label>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <?php form_close(); ?>

    </div>
  </div>

  </div>
  <!-- /.container-fluid -->
