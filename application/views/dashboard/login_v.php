<br><br><br>
<div class="container ">

        <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Sistem Pengaduan Mahasiswa</h1>
                                    </div> 
                                    <?= form_open('Auth/Login', 'class="admin"'); ?>
                                    <form role="form" class="user">
                                        <div class="form-group">
                                            <label for="username">username</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" 
                                                placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                        <label for="password">password</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Masukan Password">
                                        </div>
                                        
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
                                       
                                    </form>
                                    <div class="text-center">
                                        <div class="row justify-content-center">
                                            <div class="col mt-2">
                                        <a class="small col-5 btn btn-outline-dark " href="<?= base_url('Auth/Register') ?>">Buat Akun</a>
                                        <a class="small col-6  btn btn-outline-dark " href="<?= base_url('home') ?>">Halaman Utama</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



