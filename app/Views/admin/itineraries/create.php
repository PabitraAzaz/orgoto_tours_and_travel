<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Itineraries<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <form method="post" action=<?= base_url('admin/itineraries/' . $tour_id . '/create') ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>
        <div class="mb-3">
            <label for="day" class="form-label">Day</label>
            <input type="text" name="day" class="form-control" value="<?= esc(set_value('day')) ?>">
        </div>

        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" name="destination" value="<?= esc(set_value('destination')) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control"><?= esc(set_value('description')) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Breakfast Included?</label>
            <input type="radio" name="breakfast" value="yes" <?= esc(set_radio('breakfast', 'yes')); ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="breakfast" value="no" <?= esc(set_radio('breakfast', 'no')); ?>>
            <label for="no">No</label>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Lunch Included?</label>
            <input type="radio" name="lunch" value="yes" <?= esc(set_radio('lunch', 'yes')); ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="lunch" value="no" <?= esc(set_radio('lunch', 'no')); ?>>
            <label for="no">No</label>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Dinner Included?</label>
            <input type="radio" name="dinner" value="yes" <?= esc(set_radio('dinner', 'yes')); ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="dinner" value="no" <?= esc(set_radio('dinner', 'no')); ?>>
            <label for="no">No</label>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</main>

<?= $this->endSection() ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->