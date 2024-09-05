  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?= base_url('') ?>home">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry">

              <div class="entry-img">
                <img src="<?= base_url('assets/'); ?>page/blog/main.png" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?= base_url('') ?>Blog/carapengaduan">Cara Melakukan Layanan Pengaduan Mahasiswa</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">Admin</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">April 01, 2024</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                Selamat datang dipanduan menggunakan layanan pengaduan mahasiswa, pada penjelasan artikel dibawah ini akan menjelaskan cara melakukan pengaduan mahasiswa.
                </p>
                <div class="read-more">
                  <a href="<?= base_url('') ?>Blog/carapengaduan">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->


           
<!-- 
            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div> -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">
              <div class="sidebar">
                <h3 class="sidebar-title">Artikel Berkaitan</h3>
                <div class="sidebar-item recent-posts">
                  <div class="post-item clearfix">
                    <img src="<?= base_url('') ?>assets/page/blog/main.png" alt="">
                    <h4><a href="<?= base_url('') ?>carapengaduan">Cara Melakukan Layanan Pengaduan Mahasiswa</a></h4>
                    <time datetime="2020-01-01">April 01, 2024</time>
                  </div>

                </div><!-- End sidebar recent posts-->
              </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->