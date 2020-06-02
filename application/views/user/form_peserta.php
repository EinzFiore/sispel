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

                    <?= form_open_multipart('user/addPeserta'); ?>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Nama Lengkap</label>
                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                        <?= form_error('nama'); ?>
                      </div>
                      <div class="col-sm-6">
                        <label for="validationTooltip01">NIK(No.Identitas)</label>
                        <input type="text" class="form-control" name="nik" placeholder="16 Digit">
                        <?= form_error('nik'); ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Alamat Lengkap</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                        <?= form_error('alamat'); ?>
                      </div>
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Jenis Kelamin</label>
                          <select class="form-control" name="jk" id="exampleFormControlSelect1">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                          <?= form_error('jk'); ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label>Tanggal Lahir</label>
                        <input type="text" placeholder="Yy-Mm-Dd" class="form-control" name="tl" id="datepicker">
                        <?= form_error('tl'); ?>
                      </div>
                      
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Foto Diri</label>
                        <div id="image-preview" class="image-preview">
                              <img src="<?= base_url('assets/img/profile/').$user['foto']; ?>" width="90%" alt="">
                            </div>
                            <div class="custom-file mt-2">
                            <input type="file" name="foto" class="custom-file-input pt-3" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <p>Foto harus formal</p>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                      </div>
                      <div class="col-sm-6">
                      <button type="submit" class="btn btn-md btn-primary">Next >></button>
                      </div>
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
