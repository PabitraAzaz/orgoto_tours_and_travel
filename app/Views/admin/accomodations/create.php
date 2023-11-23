<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Accomodations<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <form method="post" action=<?= base_url('admin/accomodations/' . $tour_id . '/create') ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" name="destination" class="form-control" value="<?= esc(set_value('destination')) ?>">
        </div>

        <div class="mb-3">
            <label for="hotel" class="form-label">Hotel</label>
            <input type="text" name="hotel" value="<?= esc(set_value('hotel')) ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</main>

<?= $this->endSection() ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->