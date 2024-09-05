<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


	<!-- Carousel -->
	<div id="carouselExampleFade" class="carousel slide carousel-fade bg-light mb-4" data-ride="carousel">
		<div class="container">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row d-flex">
						<div class="col-lg-12">
							<?= form_open('Auth/ChangePasswordController') ?>
							<div class="form-group">
								<label for="current_password">Password Sekarang</label>
								<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Masukan Password Lama" required >
							</div>
							<div class="form-group">
								<label for="new_password">Password Baru</label>
								<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Masukan Password Baru" minlength="6" required>
							</div>
							<div class="form-group">
								<label for="confirm_password">Konfirmasi Password Baru</label>
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password Baru" aria-describedby="currentPasswordHelp" minlength="6" required> 
								<small id="currentPasswordHelp" class="form-text text-muted">Jangan pernah beritahukan password kepada siapapun.</small>
							</div>
							<div class="custom-control custom-checkbox mb-2">
								<input type="checkbox" class="custom-control-input" id="check_confirmation_password" name="confirmation_password" value="agree" required>
								<label class="custom-control-label" for="check_confirmation_password" >Anda yakin mengganti Password ?</label>
							</div>
							<button type="submit" class="btn btn-danger">Simpan Perubahan</button>
							<?= form_close(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Carousel -->

</div>
        <!-- /.container-fluid -->