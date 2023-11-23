<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Sliders<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>
    
    <?= $this->include('/admin/components/alert_message'); ?>
    <form method="post" action=<?= base_url('admin/categories/create') ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="title" class="form-control" value="<?= esc(set_value('name')) ?>">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Category Slug [*use small character]</label>
            <input type="text" name="slug" id="title" class="form-control" value="<?= esc(set_value('slug')) ?>">
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>
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