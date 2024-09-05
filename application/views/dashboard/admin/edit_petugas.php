<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="<?= base_url('Admin/PetugasController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-12">

     <?= form_open('Admin/PetugasController/edit/'.$petugas['id_petugas']); ?>

     <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= $petugas['nama'] ?>">
    </div>

    <div class="form-group">
      <label for="telp">Telp</label>
      <input type="text" class="form-control" id="telp" placeholder="" name="telp" value="<?= $petugas['telp'] ?>">
    </div>

    <label for="">Level</label>
    <div class="form-group">
      <?php foreach($role as $key => $item) { ?>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="role_id" id="admin<?= $key ?>" value="<?= $item->id ?>" <?= $petugas['role_id'] == $item->id ? 'checked' : ''; ?>>
          <label class="form-check-label" for="admin<?= $key ?>"><?= $item->nama ?></label>
        </div>
        <?php } ?>

      
    </div>

    <button type="submit" class="btn btn-danger">Submit</button>
    <?= form_close(); ?>
  </div>
</div>

<!-- /.container-fluid -->
</div>