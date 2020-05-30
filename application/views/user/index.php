 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Peserta</h1>
          </div>

          <div class="section-body">
              <!-- Hero Profile -->
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/')?>img/cover_profile.jpg">
                    <div class="hero-inner">
                        <div class="row">
                            <div class="col-sm-1 mr-3">
                                <figure class="avatar mr-2 avatar-xl">
                                    <img src="<?= base_url('assets/img/profile/') . $user['foto'] ?>">
                                    <i class="avatar-presence online"></i>
                                </figure>
                            </div>
                            <div class="col-sm-6">
                                <h2>Selamat Datang, <?= $user['nama']?> !</h2>
                                <p class="lead">Kategori Pelatihan</p>
                                <p class="lead">Nama Pelatihan</p>
                                <p class="lead">Nomor Registrasi</p>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>Update Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Hero Profile -->

            <!-- Profile -->
            <div class="data-profile mr-3">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="card">
                            <div class="card-header  bg-primary text-white">
                            <h3>Profil</h3>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-3">No. KTP</dt>
                                    <dd class="col-sm-9">1212xxxxxxxxxxxx.</dd>

                                    <dt class="col-sm-3">Jenis Kelamin</dt>
                                    <dd class="col-sm-9">
                                        <p>Laki-laki.</p>
                                    </dd>

                                    <dt class="col-sm-3">Tempat/Tanggal Lahir</dt>
                                    <dd class="col-sm-9">
                                        <p>Jakarta, 06 Februari, 2000.</p>
                                    </dd>
                                        <p class="col-sm-12"><strong>Akun ini dibuat sejak :</strong> <?= date('d F Y', $user['date_created']);?></p>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-header  bg-primary text-white">
                            <h3>Kontak</h3>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-3">Email</dt>
                                    <dd class="col-sm-9"><?= $user['email'] ?></dd>

                                    <dt class="col-sm-3">No. HP</dt>
                                    <dd class="col-sm-9">
                                        <p><?= $user['no_hp']?></p>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-header  bg-primary text-white">
                            <h3>Pendidikan</h3>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <h5 class="col-sm-3">SMK</h5>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="card">
                            <div class="card-header  bg-primary text-white">
                            <h3>Alamat</h3>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-sm-3">Cikampek, Perum Regensi Jalan Onik 10 RT/04 RW/13 No.14</dt>

                                    <dt class="col-sm-3">Jawa Barat, Karawang</dt>

                                    <dt class="col-sm-3">41374</dt>
                                </dl>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
          </div>
        </section>
      </div>
  