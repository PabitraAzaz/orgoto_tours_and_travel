<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Itineraries|Edit<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <form method="post" action=<?= base_url('admin/itineraries/' . $tours_id . '/edit/' . $id) ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div id="img-container" style="width: 300px;" class="m-5">
            <img class="img-fluid rounded" src="<?= base_url('uploads/tours/itineraries/' . $iti['cover_image']) ?>" alt="No image">
        </div>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>
        <div class="mb-3">
            <label for="day" class="form-label">Day</label>
            <input type="text" name="day" class="form-control" value="<?= $iti['day'] ?>">
        </div>

        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" name="destination" value="<?= $iti['destinations'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control"><?= $iti['description'] ?></textarea>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Breakfast Included?</label>
            <input type="radio" name="breakfast" value="yes" <?php echo ($iti['breakfast'] === 'yes') ? 'checked' : ''; ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="breakfast" value="no" <?php echo ($iti['breakfast'] === 'no') ? 'checked' : ''; ?>>
            <label for="no">No</label>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Lunch Included?</label>
            <input type="radio" name="lunch" value="yes" <?php echo ($iti['lunch'] === 'yes') ? 'checked' : ''; ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="lunch" value="no" <?php echo ($iti['lunch'] === 'no') ? 'checked' : ''; ?>>
            <label for="no">No</label>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Dinner Included?</label>
            <input type="radio" name="dinner" value="yes" <?php echo ($iti['dinner'] === 'yes') ? 'checked' : ''; ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="dinner" value="no" <?php echo ($iti['dinner'] === 'no') ? 'checked' : ''; ?>>
            <label for="no">No</label>
        </div>



        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>

<?= $this->endSection() ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->