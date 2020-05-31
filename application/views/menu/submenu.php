 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Menu</h1>
          </div>

        <div class="row">
            <div class="col-lg">
            <?php
            if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSubmenu">Tambah Submenu Baru</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Submenu</th>
                        <th scope="col">Menu</th>
                        <th scope="col">URL</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1; ?>
                    <?php foreach($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $sm['judul']; ?></td>   
                            <td><?= $sm['menu']; ?></td>   
                            <td><?= $sm['url']; ?></td>   
                            <td><?= $sm['icon']; ?></td>   
                            <td><?= $sm['is_active']; ?></td>   
                            <td>
                                <a href="" class="badge badge-success">Ubah</a>
                                <a href="" class="badge badge-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

        <!-- Modal Tambah Menu -->

<div class="modal fade" id="addSubmenu" tabindex="-1" role="dialog" aria-labelledby="addSubmenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSubmenuLabel">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('menu/submenu') ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <input name="judul" type="text" class="form-control" id="judul" placeholder="Nama Sub Menu">
                </div>
                <div class="form-group">
                    <select class="form-control" name="menu_id" id="menu_id">
                        <option value="">Pilih Menu</option>
                        <?php foreach($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <input name="url" type="text" class="form-control" id="url" placeholder="URL Submenu">
                </div>
                <div class="form-group">
                    <input name="icon" type="text" class="form-control" id="icon" placeholder="Icon Menu">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Active?
                        </label>
                    </div>
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