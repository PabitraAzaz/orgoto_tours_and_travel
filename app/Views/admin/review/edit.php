<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Edit<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <?= $this->include('/admin/components/alert_message'); ?>


    <form method="post" action=<?= base_url('admin/review/edit/' . $review['id']) ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div id="img-container" style="width: 300px;" class="m-5">
            <img class="img-fluid rounded" src="<?= base_url('uploads/reviews/' . $review['image']) ?>" alt="No image">
        </div>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?= $review['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea type="text" name="message" class="form-control"><?= $review['message'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
<?= $this->endSection() ?>
</div>