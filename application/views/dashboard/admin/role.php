<!-- Begin Page Content -->
<div class="container-fluid">
 
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class=" card col-lg-12">
      <?= form_open('Admin/RoleController'); ?>
      <div class="form- mt-2">
        <label for="nama">Nama Role</label>
        <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= set_value('nama') ?>" required>
      </div>

      <label for="">Permission</label>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="permission[]" id="admin" value="pengaduan">
          <label class="form-check-label" for="admin">Pengaduan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="permission[]" id="admin1" value="tulis pengaduan">
          <label class="form-check-label" for="admin1">Tulis Pengaduan</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="permission[]" id="staff" value="petugas">
          <label class="form-check-label" for="staff">Petugas</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="permission[]" id="akademik" value="role">
          <label class="form-check-label" for="dosen">Role</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="permission[]" id="prodi" value="mahasiswa">
          <label class="form-check-label" for="pegawai">Mahasiswa</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary mb-2">Submit</button>
      <?= form_close(); ?>
    </div>
  </div>

  <!-- Page Heading -->


  <h1 class="h3 mb-4 mt-5 text-gray-800">Data Role</h1>

  <div class="table-responsive">
    <table class="table align-middle mb-0 bg-white shadow datatable">
      <thead class="bg-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Role Permission</th>
          <th scope="col">Permission</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_role as $dp) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $dp['nama']; ?></td>
            <td>
              <?php 
                $perm = json_decode($dp['permission']);

                foreach($perm as $value) {
                  echo $value.'<br>';
                }
              ?>
              
            </td>
            <td>
                <a href="<?= base_url('Admin/RoleController/edit/' . $dp['id']) ?>" class="btn btn-info">Edit</a>
                <a href="<?= base_url('Admin/RoleController/delete/' . $dp['id']) ?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>