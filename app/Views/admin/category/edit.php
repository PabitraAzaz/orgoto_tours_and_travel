<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Category|Edit<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <?= $this->include('/admin/components/alert_message'); ?>


    <form method="post" action=<?= base_url('admin/categories/edit/' . $cat['id']) ?> enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="title" class="form-control" value="<?= $cat['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Category Slug [*use lowercase]</label>
            <input type="text" name="slug" id="title" class="form-control" value="<?= $cat['slug'] ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
<?= $this->endSection() ?>
</div>