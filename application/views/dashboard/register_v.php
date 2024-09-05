<div class="container ">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Silahkan Daftar!</h1>
                </div>
                <?= form_open('Auth/Register', 'class="User"'); ?>

                <form role="form" class="user">
                  <div class="form-group">
                  <label for="nim">*NIM</label>
                    <input type="number" class="form-control form-control-user" id="nim" name="nim" placeholder="Masukan NIM" value="<?= set_value('nim') ?>" minlength="8" required>
                    <h6 class="small mt-1">*Masukan minimal 8 karakter</h6>

                  </div>

                  <div class="form-group">
                  <label for="nama">*Nama Lengkap</label>
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" required>
                  </div>

                  <div class="form-group">
                  <label for="email">*Email</label>
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                  </div>

                  <div class="form-group">
                  <label for="prodi">*Program Studi</label>
                    <select class="form-control" aria-label="Default select example" id="prodi" name="prodi" value="<?= set_value('prodi') ?>" required>
                      <option selected>Prodi</option>
                      <option value="Sistem Informasi" for="sistem informasi">Sistem Informasi</option>
                      <option value="Teknik Informatika" for="Teknik Informatika">Teknik Informatika</option>
                      <option value="Sistem Komputer" for="sistem komputer">Sistem Komputer</option>
                    </select>
                  </div>


                  <div class="form-group">
                  <label for="username">*username</label>
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>" minlength="8" required >
                    <h6 class="small mt-1">*Masukan Minimal 8 Karakter </h6>
                  </div>

                  <div class="form-group">
                  <label for="password">*password</label>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password" value="<?= set_value('password') ?>" minlength="6" required>
                    <h6 class="small mt-1">*Masukan Minimal 8 Karakter </h6>

                  </div>

                  <div class="form-group">
                  <label for="telp">*Nomor Telephone Aktif</label>
                    <input type="number" class="form-control form-control-user" id="telp" name="telp" placeholder="Masukan Nomor Telephon" value="<?= set_value('telp') ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
             
                </form>

          
                <div class="text-center">
                                        <div class="row justify-content-center">
                                            <div class="col mt-1">
                                        <a class="small col-5 btn btn-outline-dark " href="<?= base_url('Auth/Login') ?>">Masuk</a>
                                        <a class="small col-6  btn btn-outline-dark " href="<?= base_url('home') ?>">Halaman Utama</a>
                                        </div>
                                        </div>
                                    </div>
              </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>