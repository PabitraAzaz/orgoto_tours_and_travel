<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Places<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <form method="post" action=<?= base_url('admin/places/' . $tour_id . '/create') ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Place Name</label>
            <input type="text" name="name" class="form-control" value="<?= esc(set_value('name')) ?>">
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</main>

<?= $this->endSection() ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->