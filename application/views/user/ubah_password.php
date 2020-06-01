 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $judul; ?></h1>
          </div>
          <div class="section-body">
            <h2 class="section-title"><?= $judul; ?></h2>
            <div class="card">
              <div class="card-body">
                    <div class="row mt-4">
                      <div class="col-sm-6">
                        <?= $this->session->flashdata('message'); ?>
                      </div>
                      <div class="col-12 ">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-key"></i>
                            </div>
                            <div class="wizard-step-label">
                              <?= $judul; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                        <form class="form" method="post" action="<?= base_url('user/ubah_password'); ?>">
                            <div class="form-group row ml-3">
                                <div class="col-sm-4">
                                    <label for="inputPassword6">Password Lama</label>
                                    <input type="password" placeholder="Masukan Password Lama" name="oldpassword" class="form-control " aria-describedby="passwordHelpInline">
                                    <small class="text-danger">
                                        <?= form_error('oldpassword'); ?>
                                    </small>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputPassword6">Password Baru</label>
                                    <input type="password" placeholder="Masukan Password Baru" name="newpassword" class="form-control " aria-describedby="passwordHelpInline">
                                    <small class="text-danger">
                                        <?= form_error('newpassword'); ?>
                                    </small>
                                    <small class="text-muted">
                                        Password Harus Lebih Dari 5 Karakter
                                    </small>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputPassword6">Konfirmasi Password</label>
                                    <input type="password" placeholder="Konfirmasi Password" name="newpassword_confirm" class="form-control " aria-describedby="passwordHelpInline">
                                    <small class="text-danger">
                                        <?= form_error('newpassword_confirm'); ?>
                                    </small>
                                    <small class="text-muted">
                                        Password Harus Lebih Dari 5 Karakter
                                    </small>
                                </div>
                            </div>
                
                  <div class="form-group row">
                    <div class="col-sm ">
                    <a href="<?= base_url('user') ?>" class="btn btn-md btn-warning mr-2 ml-4">Kembali</a>
                    <button type="submit" class="btn btn-md btn-primary mr-3">Ubah Password</button>
                    </div>
                </div>
            </form>
                  
              <div class="card-footer bg-whitesmoke">
                SISPEL | Kelompok 1
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

          

 