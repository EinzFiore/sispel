 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Role</h1>
          </div>

        <div class="row">
            <div class="col-lg-6">
            <?php
            if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRole">Tambah Role Baru</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1; ?>
                    <?php foreach($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $r['name_role']; ?></td>   
                            <td>
                                <a href="<?= base_url('admin/akses_role/'). $r['id_role'];?>" class="badge badge-warning">Akses</a>
                                <a href="#" class="badge badge-success">Ubah</a>
                                <a href="#" class="badge badge-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

        <!-- Modal Tambah Role -->

<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRoleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRoleLabel">Tambah Role Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('Role') ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <input name="Role" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Role">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
  </div>
</div>

