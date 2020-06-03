    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $judul ?></h1>
          </div>
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $judul ?></h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Nama Peserta</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <?php foreach($user_data as $usr) : ?>
                        <tbody>
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td><?= $usr['nama']; ?></td>
                            <td><?= $usr['jk']; ?></td>
                            <td><?= $usr['email']; ?></td>
                            <td><img alt="image" src="<?= base_url('assets/img/profile/') . $usr['foto']; ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $usr['nama'] ?>"></td>
                            <!-- <td><div class="badge badge-success">Completed</div></td> -->
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                        </tbody>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </section>
    </div>