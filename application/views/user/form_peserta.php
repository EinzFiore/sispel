      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Lengkapi Data Peserta</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Data Pribadi</h2>
            <p class="section-lead">Silahkan lengkapi form dibawah Untuk lengkapi data anda</p>
            <div class="card">
              <div class="card-header">
                <h4>Example Card</h4>
              </div>
              <div class="card-body">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                              Data Pribadi
                            </div>
                          </div>
                          <div class="wizard-step">
                            <div class="wizard-step-icon">
                              <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                              Pilih Pelatihan
                            </div>
                          </div>
                          <div class="wizard-step">
                            <div class="wizard-step-icon">
                              <i class="fas fa-server"></i>
                            </div>
                            <div class="wizard-step-label">
                              Server Information
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <form class="wizard-content mt-2" method="post" action="<?= base_url('user/addPeserta')?>">
                      <div class="wizard-pane">
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Nama Lengkap</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
                          <?= form_error('nama'); ?>
                          </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">NIK(No. Identitas)</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" name="nik" placeholder="16 digit" class="form-control">
                                <?= form_error('nik'); ?>
                            </div>
                        </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right text-left mt-2">Alamat Lengkap</label>
                        <div class="col-lg-4 col-md-6">
                            <textarea class="form-control" name="alamat"></textarea>
                            <?= form_error('alamat'); ?>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Tanggal Lahir</label>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" id="datepicker" name="tl" class="form-control">
                                <?= form_error('tl'); ?>
                            </div>
                        </div>

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right text-left mt-2">Jenis Kelamin</label>
                        <div class="col-lg-4 col-md-6">
                            <select class="form-control" name="jk" id="exampleFormControlSelect1">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jk'); ?>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-md-4 text-md-right text-left mt-2">Upload Foto</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                                <p>Foto harus formal</p>
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                              <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
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
