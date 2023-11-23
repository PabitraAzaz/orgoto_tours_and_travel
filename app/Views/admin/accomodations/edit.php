<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Accomodations|Edit<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <form method="post" action=<?= base_url('admin/accomodations/' . $tours_id . '/edit/' . $id) ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div id="img-container" style="width: 300px;" class="m-5">
            <img class="img-fluid rounded" src="<?= base_url('uploads/tours/accomodation/' . $acc['cover_image']) ?>" alt="No image">
        </div>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" name="destination" class="form-control" value="<?= $acc['destination'] ?>">
        </div>

        <div class="mb-3">
            <label for="hotel" class="form-label">Hotel</label>
            <input type="text" name="hotel" value="<?= $acc['hotel'] ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>

<?= $this->endSection() ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->