<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Accomodations<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <div>
        <a href="<?= base_url('admin/accomodations/' . $id . '/create') ?>"><button type="button" class="btn btn-primary m-2">
                Add
            </button></a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Accomodations</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Destination</th>
                            <th>Hotel</th>
                            <th>Actions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($acc as $key => $tourDetails) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td> <img src="<?= base_url('/uploads/tours/accomodation/' . $tourDetails['cover_image']) ?>" class="img-circle elevation-2" style="height :50px ; width:50px"> </td>
                                <td><?= $tourDetails['destination'] ?></td>
                                <td><?= $tourDetails['hotel'] ?></td>

                                <td><a href="<?= base_url("/admin/accomodations/" . $id . "/" . "edit/" . $tourDetails["id"]) ?>" class="text-white"><button class="btn-success btn">View</button></a></td>

                                <td><a href="<?= base_url("/admin/accomodations/" . $id . "/" . "delete/" . $tourDetails["id"]) ?>" class="text-white" onclick="return confirm('Are you sure to delete <?= $tourDetails['destination']  ?>?')"><button class="btn-danger btn">Delete</button></a></td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Destination</th>
                            <th>Hotel</th>
                            <th>Actions</th>
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

<!-- /.control-sidebar -->