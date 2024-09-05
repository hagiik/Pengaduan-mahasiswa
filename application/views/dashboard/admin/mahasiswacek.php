<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="table-responsive">
    <table class="table align-middle mb-0 bg-white shadow datatable">
      <thead class="bg-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Nim</th>
          <th scope="col">Username</th>
          <th scope="col">Telp</th>
          <th scope="col">Aksi</th>
  
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($mahasiswa as $dp) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $dp['nama']; ?></td>
            <td><?= $dp['nim']; ?></td>
            <td><?= $dp['username']; ?></td>
            <td><?= $dp['telp']; ?></td>  
            <td>
              <?php if ($dp['username'] == $this->session->userdata('username')) : ?>
                <small>Tidak ada aksi</small>
              <?php else : ?>
                <a href="<?= base_url('Admin/MahasiswaController/delete/' . $dp['nim']) ?>" class="btn btn-danger">Hapus</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>