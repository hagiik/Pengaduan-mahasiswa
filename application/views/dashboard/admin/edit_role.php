<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="<?= base_url('Admin/RoleController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-12">

     <?= form_open('Admin/RoleController/edit/'.$role['id']); ?>

     <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= $role['nama'] ?>">
    </div>


    <?php 
      $perm = json_decode($role['permission']);
    ?>

    <label for="">Level</label>
    <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="permission[]" id="admin" value="pengaduan" <?= in_array("pengaduan", $perm) ? 'checked' : ''; ?>>
        <label class="form-check-label" for="admin">Pengaduan</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="permission[]" id="admin1" value="tulis pengaduan" <?= in_array("tulis pengaduan", $perm) ? 'checked' : ''; ?>>
          <label class="form-check-label" for="admin1">Tulis Pengaduan</label>
        </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="permission[]" id="staff" value="petugas" <?= in_array("petugas", $perm) ? 'checked' : ''; ?> >
        <label class="form-check-label" for="petugas">Petugas</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="permission[]" id="akademik" value="role" <?= in_array("role", $perm) ? 'checked' : ''; ?> >
        <label class="form-check-label" for="petugas">Role</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="permission[]" id="prodi" value="mahasiswa" <?= in_array("mahasiswa", $perm) ? 'checked' : ''; ?> >
        <label class="form-check-label" for="petugas">Mahasiswa</label>
      </div>
    </div>

    <button type="submit" class="btn btn-danger">Submit</button>
    <?= form_close(); ?>
  </div>
</div>

<!-- /.container-fluid -->
</div>