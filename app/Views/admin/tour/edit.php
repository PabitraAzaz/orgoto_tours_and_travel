<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Tours|Edit<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <?= $this->include('/admin/components/alert_message'); ?>

    <div class="pt-2">
        <a href="<?= base_url('admin/accomodations/' . $tour['id']) ?>"><button type="button" class="btn btn-warning">Accomodations</button></a>
        <a href="<?= base_url('admin/itineraries/' . $tour['id']) ?>"><button type="button" class="btn btn-warning">Itineraries</button></a>
        <a href="<?= base_url('admin/places/' . $tour['id']) ?>"><button type="button" class="btn btn-warning">Places to Visit</button></a>
    </div>


    <form method="post" action=<?= base_url('admin/tours/edit/' . $tour['id']) ?> enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div id="img-container" style="width: 300px;" class="m-5">
            <img class="img-fluid rounded" src="<?= base_url('uploads/tours/' . $tour['cover_image']) ?>" alt="No image">
        </div>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="tour_image" class="form-label">Tour Image</label>
                <input type="file" name="tour_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category Name</label>
            <select name="category" class="form-control">
                <?php for ($i = 0; $i < count($cat); $i++) : ?>
                    <?php if ($tour["categories"] === $cat[$i]["id"]) : ?>
                        <option value="<?= $cat[$i]["id"] ?>" selected><?= $cat[$i]["name"] ?></option>
                    <?php else : ?>
                        <option value="<?= $cat[$i]["id"] ?>"><?= $cat[$i]["name"] ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="continent" class="form-label">Continent</label>
            <select name="continent" class="form-control">
                <?php if ($tour['continent'] == 'asia') : ?>
                    <option value="asia" selected>Asia</option>
                    <option value="africa">Africa</option>
                    <option value="europe">Europe</option>
                    <option value="north_america">North America</option>
                    <option value="south_amrica">South Amrica</option>
                    <option value="oseania">Oseania</option>
                    <option value="antarctica">Antarctica</option>
                <?php elseif ($tour['continent'] == 'africa') : ?>
                    <option value="asia">Asia</option>
                    <option value="africa" selected>Africa</option>
                    <option value="europe">Europe</option>
                    <option value="north_america">North America</option>
                    <option value="south_amrica">South Amrica</option>
                    <option value="oseania">Oseania</option>
                    <option value="antarctica">Antarctica</option>
                <?php elseif ($tour['continent'] == 'europe') : ?>
                    <option value="asia">Asia</option>
                    <option value="africa">Africa</option>
                    <option value="europe" selected>Europe</option>
                    <option value="north_america">North America</option>
                    <option value="south_amrica">South Amrica</option>
                    <option value="oseania">Oseania</option>
                    <option value="antarctica">Antarctica</option>
                <?php elseif ($tour['continent'] == 'north_america') : ?>
                    <option value="asia">Asia</option>
                    <option value="africa">Africa</option>
                    <option value="europe">Europe</option>
                    <option value="north_america" selected>North America</option>
                    <option value="south_amrica">South Amrica</option>
                    <option value="oseania">Oseania</option>
                    <option value="antarctica">Antarctica</option>
                <?php elseif ($tour['continent'] == 'south_amrica') : ?>
                    <option value="asia">Asia</option>
                    <option value="africa">Africa</option>
                    <option value="europe">Europe</option>
                    <option value="north_america">North America</option>
                    <option value="south_amrica" selected>South Amrica</option>
                    <option value="oseania">Oseania</option>
                    <option value="antarctica">Antarctica</option>
                <?php elseif ($tour['continent'] == 'oseania') : ?>
                    <option value="asia">Asia</option>
                    <option value="africa">Africa</option>
                    <option value="europe">Europe</option>
                    <option value="north_america">North America</option>
                    <option value="south_amrica">South Amrica</option>
                    <option value="oseania" selected>Oseania</option>
                    <option value="antarctica">Antarctica</option>
                <?php else : ?>
                    <option value="asia">Asia</option>
                    <option value="africa">Africa</option>
                    <option value="europe">Europe</option>
                    <option value="north_america">North America</option>
                    <option value="south_amrica">South Amrica</option>
                    <option value="oseania">Oseania</option>
                    <option value="antarctica" selected>Antarctica</option>
                <?php endif ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Tour Name</label>
            <input type="text" name="title" class="form-control" value="<?= $tour['title'] ?>">
        </div>
        <div class="mb-3">
            <label for="sh_desc" class="form-label">Short Description</label>
            <textarea name="sh_desc" class="form-control"><?= $tour['short_description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" value="<?= $tour['price'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="number" name="duration" value="<?= $tour['duration'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="j_d_1" class="form-label">Journey Date (One)</label>
            <input type="text" name="j_d_1" value="<?= $tour['journey_date_1'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="j_d_2" class="form-label">Journey Date (Two)</label>
            <input type="text" name="j_d_2" value="<?= $tour['journey_date_2'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="j_d_3" class="form-label">Journey Date (Three)</label>
            <input type="text" name="j_d_3" value="<?= $tour['journey_date_3'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="trip_map_description" class="form-label">Trip Map Description</label>
            <textarea name="trip_map_description" class="form-control"><?= $tour['trip_map_description'] ?> </textarea>
        </div>

        <div id="img-container" style="width: 300px;" class="m-5">
            <img class="img-fluid rounded" src="<?= base_url('uploads/tours/tripmaps/' . $tour['trip_map_image']) ?>" alt="No image">
        </div>
        <div class="mb-3">
            <div id="img-container" class="mb-1 border-danger">
                <label for="trip_map_image" class="form-label">Trip Map Image</label>
                <input type="file" name="trip_map_image" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
<?= $this->endSection() ?>
</div>