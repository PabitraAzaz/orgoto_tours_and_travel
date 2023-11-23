<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Create<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>
    <?= $this->include('/admin/components/alert_message'); ?>
    <form method="post" action=<?= base_url('admin/tours/create') ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="tour_image" class="form-label">Tour Image</label>
                <input type="file" name="tour_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category Name</label>
            <select name="category" class="form-control">
                <option disabled selected>Choose a Category</option>




                <?php foreach ($cat as $catName) : ?>
                    <option value="<?= $catName['id'] ?>" <?= set_select('category', $catName['id'], False); ?>><?= $catName['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="continent" class="form-label">Continent</label>
            <select name="continent" class="form-control">
                <option disabled selected>Choose a Continent</option>
                <option value="asia" <?= esc(set_select('continent', 'asia', (!empty($data) && $data == "asia" ? TRUE : FALSE))); ?>>Asia</option>
                <option value="africa" <?= esc(set_select('continent', 'africa', (!empty($data) && $data == "africa" ? TRUE : FALSE))); ?>>Africa</option>
                <option value="europe" <?= esc(set_select('continent', 'europe', (!empty($data) && $data == "europe" ? TRUE : FALSE))); ?>>Europe</option>
                <option value="north_america" <?= esc(set_select('continent', 'north_america', (!empty($data) && $data == "north_america" ? TRUE : FALSE))); ?>>North America</option>
                <option value="south_amrica" <?= esc(set_select('continent', 'south_amrica', (!empty($data) && $data == "south_amrica" ? TRUE : FALSE))); ?>>South America</option>
                <option value="oseania" <?= esc(set_select('continent', 'oseania', (!empty($data) && $data == "oseania" ? TRUE : FALSE))); ?>>Oseania</option>
                <option value="antarctica" <?= esc(set_select('continent', 'antarctica', (!empty($data) && $data == "antarctica" ? TRUE : FALSE))); ?>>Antarctica</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="title" class="form-label">Tour Name</label>
            <input type="text" name="title" class="form-control" value="<?= esc(set_value('title')) ?>">
        </div>
        <div class="mb-3">
            <label for="sh_desc" class="form-label">Short Description</label>
            <textarea name="sh_desc" class="form-control"> <?= esc(set_value('sh_desc')) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" value="<?= esc(set_value('price')) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="number" name="duration" value="<?= esc(set_value('duration')) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="j_d_1" class="form-label">Journey Date (One)</label>
            <input type="text" name="j_d_1" value="<?= esc(set_value('j_d_1')) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="j_d_2" class="form-label">Journey Date (Two)</label>
            <input type="text" name="j_d_2" value="<?= esc(set_value('j_d_2')) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="j_d_3" class="form-label">Journey Date (Three)</label>
            <input type="text" name="j_d_3" value="<?= esc(set_value('j_d_3')) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="trip_map_description" class="form-label">Trip Map Description</label>
            <textarea name="trip_map_description" class="form-control"><?= esc(set_value('trip_map_description')) ?> </textarea>
        </div>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="trip_map_image" class="form-label">Trip Map Image</label>
                <input type="file" name="trip_map_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
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