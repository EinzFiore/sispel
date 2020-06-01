 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $judul; ?></h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Pribadi</h2>
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
                              <i class="far fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                              Data Pribadi
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?= form_open_multipart('user/edit'); ?>

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="validationTooltip01">Nama Lengkap</label>
                      <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                      <input type="text" class="form-control" name="nama" id="validationTooltip01" placeholder="Nama Lengkap" value="<?= $user['nama']; ?>">
                    </div>
                    <div class="col-sm-6">
                      <label for="validationTooltip01">NIK(No.Identitas)</label>
                      <input type="text" class="form-control" name="nik" id="validationTooltip01" placeholder="16 Digit" value="<?= $user['no_ktp']; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="validationTooltip01">Alamat Lengkap</label>
                      <input type="text" class="form-control" name="alamat" id="validationTooltip01" placeholder="Alamat" value="<?= $user['alamat']; ?>">
                    </div>
                    <div class="col-sm-6">
                      <label for="validationTooltip01">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="exampleFormControlSelect1">
                          <option><?= $user['jk'] ?></option>
                          <option>----------</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jk'); ?>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label>Tanggal Lahir</label>
                      <input type="text" placeholder="Yy-Mm-Dd" class="form-control" name="tl" id="datepicker" value="<?= $user['tgl_lahir']; ?>">
                      <br>
                      <label>Nomor Telepon</label>
                      <input type="text" class="form-control" name="no_hp" value="<?= $user['no_hp']; ?>">
                    </div>
                    
                    <div class="col-sm-6">
                      <label for="validationTooltip01">Foto Diri</label>
                      <div id="image-preview" class="image-preview">
                            <img src="<?= base_url('assets/img/profile/').$user['foto']; ?>" width="90%" alt="">
                          </div>
                          <div class="custom-file mt-2">
                          <input type="file" class="custom-file-input pt-3" name="foto" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                          <p>Foto harus formal</p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                    <a href="#" class="btn btn-md btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-md btn-primary">Ubah</button>
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

          

 