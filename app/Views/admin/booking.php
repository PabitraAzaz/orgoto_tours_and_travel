<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tour-booking<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Booking</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>No. of People</th>
                            <th>Journey Date</th>
                            <th>Tour Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($book as $key => $tourDetails) :
                        ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>

                                <td><?= $tourDetails['name'] ?></td>
                                <td><?= $tourDetails['email'] ?></td>
                                <td><?= $tourDetails['phone_no'] ?></td>
                                <td><?= $tourDetails['message'] ?></td>
                                <td><?= $tourDetails['people'] ?></td>
                                <td><?= $tourDetails['journey_date'] ?></td>
                                <td><?= $tourDetails['title'] ?></td>

                                <td><a href="<?= base_url("/admin/booking/delete/" . $tourDetails["id"]) ?>" class="text-white" onclick="return confirm('Are you sure to delete <?= $tourDetails['name'] ?>?' "><button class="btn-danger btn">Delete</button></a></td>
                            </tr>
                        <?php endforeach ?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>No. of People</th>
                            <th>Journey Date</th>
                            <th>Tour Name</th>
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