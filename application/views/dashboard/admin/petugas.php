<!-- Begin Page Content -->
<div class="container-fluid">
 
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class=" card col-lg-12">
      <?= form_open('Admin/PetugasController'); ?>
      <div class="form- mt-2">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= set_value('nama') ?>" required>
      </div>

      <div class="form-group mt-1">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= set_value('username') ?>" required>
      </div>

      <div class="form-group">
        <label for="password">Passsword</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="" required>
      </div>

      <div class="form-group">
        <label for="telp">Telp</label>
        <input type="text" class="form-control" id="telp" placeholder="" name="telp" value="<?= set_value('telp') ?>" required>
      </div>

      <label for="">Role</label>
      <div class="form-group">
        <?php foreach($role as $key => $item) { ?>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="role_id" id="admin<?= $key ?>" value="<?= $item->id ?>" checked="">
          <label class="form-check-label" for="admin<?= $key ?>"><?= $item->nama ?></label>
        </div>
        <?php } ?>
        
      </div>

      <button type="submit" class="btn btn-primary mb-2">Submit</button>
      <?= form_close(); ?>
    </div>
  </div>

  <!-- Page Heading -->


  <h1 class="h3 mb-4 mt-5 text-gray-800">Data Petugas</h1>

  <div class="table-responsive">
    <table class="table align-middle mb-0 bg-white shadow datatable">
      <thead class="bg-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Telp</th>
          <th scope="col">Role</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($data_petugas as $dp) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $dp['nama']; ?></td>
            <td><?= $dp['telp']; ?></td>
            <td><?= $dp['role']; ?></td>
            <td>
              <?php if ($dp['username'] == $this->session->userdata('username')) : ?>
                <small>Tidak ada aksi</small>
              <?php else : ?>
                <a href="<?= base_url('Admin/PetugasController/edit/' . $dp['id_petugas']) ?>" class="btn btn-info">Edit</a>
                <a href="<?= base_url('Admin/PetugasController/delete/' . $dp['id_petugas']) ?>" class="btn btn-danger">Hapus</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>