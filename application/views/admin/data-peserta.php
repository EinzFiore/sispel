<?php $this->load->view('templates/header.php') ?>
<?php $this->load->view('templates/navbar.php') ?>
<?php $this->load->view('templates/sidebar.php') ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <!-- button export data peserta -->
      <a href="<?= site_url('admin/data_peserta'); ?>" class="btn btn-danger btn-lg mb-2"><i class="fas fa-print"></i> Export Pdf</a>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablePeserta">
              <thead class="bg-light">
                <tr>
                  <th>No</th>
                  <th>Nama Peserta</th>
                  <th>Jenis Kelamin</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- looping data peserta -->

                <!-- end-looping -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('templates/footer.php') ?>