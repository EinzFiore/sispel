 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Role</h1>
          </div>

        <div class="row">
            <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <h5>Role : <?= $role['name_role']; ?></h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1; ?>
                    <?php foreach($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $m['menu']; ?></td>   
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" <?= check_akses($role['id_role'],$m['id']); ?> data-role="<?= $role['id_role']; ?>" data-menu="<?= $m['id']; ?>">
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>