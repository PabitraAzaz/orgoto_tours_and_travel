<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Categories<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <div>
        <a href="<?= base_url('admin/categories/create') ?>"><button type="button" class="btn btn-primary m-2">
                Add
            </button></a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <!-- <th>Actions</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cat as $key => $product) :
                        ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['slug'] ?></td>
                                <!-- <td><a href="<? //= base_url("/admin/categories/edit/" . $product["id"]) 
                                                    ?>" class="text-white"><button class="btn-success btn">View</button></a></td> -->
                                <td><a href="<?= base_url("/admin/categories/delete/" . $product['id']) ?>" class="text-white" onclick="return confirm('Are you sure to delete <?= $product['name']  ?>?')"><button class="btn-danger btn">Delete</button></a></td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>slug</th>
                            <!-- <th>Actions</th> -->
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</main>

<?= $this->endSection() ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->