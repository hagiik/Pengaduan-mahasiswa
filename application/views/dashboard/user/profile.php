<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<div class="card mb-3 col-lg-12 shadow-lg">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/profile/' . $user['foto_profile']) ?>" class="card-img" alt="img user">
			</div>
			<div class="col-md-8">
				<div class="card-body">

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nama</label>
						<input class="form-control" type="text" placeholder="<?= $user['nama']; ?>" aria-label="Disabled input example" disabled>
					</div>

					<?php if ($this->session->userdata('username') && $this->session->userdata('role') == NULL) : ?>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">NIM</label>
							<input class="form-control" type="text" placeholder="<?= $user['nim']; ?>" aria-label="Disabled input example" disabled>
						</div>
					<?php endif; ?>

					<?php if ($this->session->userdata('username') && $this->session->userdata('role')[0]->nama == "Mahasiswa") : ?>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Prodi</label>
							<input class="form-control" type="text" placeholder="<?= $user['prodi']; ?>" aria-label="Disabled input example" disabled>
						</div>
					<?php endif; ?>

					<?php if ($this->session->userdata('username') && $this->session->userdata('role')[0]->nama == "Mahasiswa") : ?>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Email</label>
							<input class="form-control" type="text" placeholder="<?= $user['email']; ?>" aria-label="Disabled input example" disabled>
						</div>
					<?php endif; ?>

					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Telphone</label>
						<input class="form-control" type="text" placeholder="<?= $user['telp']; ?>" aria-label="Disabled input example" disabled>
					</div>


					<!-- Hanya akan dilihat Oleh admin -->
					<?php if (
						$this->session->userdata('role')[0]->nama == 'Admin' or $this->session->userdata('role')[0]->nama == 'Staff'
						or $this->session->userdata('role')[0]->nama == 'Sarana' or $this->session->userdata('role')[0]->nama == 'Akademik' or $this->session->userdata('role')[0]->nama == 'Prodi'
					) : ?>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Role</label>
							<input class="form-control" type="text" placeholder="<?= $this->session->userdata('role')[0]->nama; ?>" aria-label="Disabled input example" disabled>
						</div>

					<?php endif; ?>
					<?php // end dropdown admin hanya oleh akun admin dan petugas 
					?>

					<!-- <p class="card-text"><small class="text-muted">Member since </small></p> -->
					<a class="small btn btn-primary" href="<?= base_url('Auth/ChangePasswordController') ?>">Ganti Password!</a>

				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid