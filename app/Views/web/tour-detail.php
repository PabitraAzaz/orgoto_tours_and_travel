<?= $this->extend('web/components/assemble') ?>
<?= $this->section('title') ?>Tour Details<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <section class="pack-det-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="pack-det-banner-img position-relative">
                        <img src="<?= base_url('uploads/tours/' . $tours['tours_c_image']) ?>" class="img-fluid" alt="">
                        <div class="tours-img-meta-day">
                            <div class="day-num"><?= $tours['tours_duration'] ?></div>
                            <div class="days">Days</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="pack-det-banner-desc">
                        <div class="pack-det-banner-head">
                            <h1><?= $tours['tours_title'] ?></h1>
                            <div class="tours-img-meta-tag">
                                <?= $tours['c_name'] ?>
                            </div>
                        </div>
                        <p><?= $tours['tours_sh_desc'] ?></p>
                        <div class="pack-det-banner-date">
                            <h6>Tour Departure Date</h6>
                            <div class="depa-date-box">
                                <?php if (!empty($tours['tours_j1'])) : ?>
                                    <span class="depa-date"><?= $tours['tours_j1'] ?></span>
                                <?php endif ?>

                                <?php if (!empty($tours['tours_j2'])) : ?>
                                    <span class="depa-date"><?= $tours['tours_j2'] ?></span>
                                <?php endif ?>

                                <?php if (!empty($tours['tours_j3'])) : ?>
                                    <span class="depa-date"><?= $tours['tours_j3'] ?></span>
                                <?php endif ?>

                            </div>
                        </div>
                        <p class="pack-price">Price starts at - <b><?= $tours['tours_price'] ?> INR</b></p>
                        <a href="#popup1" class="button btn-orange">Book now</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="popup1" class="overlay3">
            <div class="popup">
                <h5><?= $tours['tours_title'] ?></h5>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="popup-img">
                                    <img src="<?= base_url('uploads/tours/' . $tours['tours_c_image']) ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="popup-form pt-2">
                                    <h6 class="mb-3">Enquiry for the package</h6>
                                    <?php $session = session() ?>
                                    <?php if ($session->getFlashdata('msg') !== null) : ?>
                                        <div class="alert alert-<?= $session->getFlashdata('msg')['type'] ?> alert-dismissible fade show d-flex justify-content-between" role="alert">
                                            <div>
                                                <?= $session->getFlashdata('msg')['msg'] ?>
                                            </div>
                                            <div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($session->get('invalid_creds') !== null) : ?>
                                        <div class="alert alert-<?= $session->get('invalid_creds')['type'] ?> alert-dismissible fade show d-flex justify-content-between" role="alert">
                                            <div>
                                                <?php foreach (array_keys($session->get('invalid_creds')['errors']) as $item) : ?>
                                                    <?= $session->get('invalid_creds')['errors'][$item] ?><br>
                                                <?php endforeach; ?>
                                            </div>
                                            <div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($session->getFlashdata('error_msg') !== null) : ?>
                                        <div class="alert alert-<?= $session->getFlashdata('error_msg')['type'] ?> alert-dismissible fade show d-flex justify-content-between" role="alert">
                                            <div>
                                                <?= $session->getFlashdata('error_msg')['msg'] ?>
                                            </div>
                                            <div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <form action="<?= base_url('thank-you/' . $tours['tours_id']) ?>" method="post">
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput1" class="form-label">Full
                                                Name</label>
                                            <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="John" name="name" value="<?= esc(set_value('name')); ?>">
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput1" class="form-label">Phone
                                                Number</label>
                                            <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="9875645354" name="phone" value="<?= esc(set_value('phone')); ?>">
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput1" class="form-label">Email
                                                Id</label>
                                            <input type="email" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="example@gmail.com" name="email" value="<?= esc(set_value('email')); ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label class="form-label" for="specificSizeSelect">Travel
                                                        Date</label>
                                                    <select class="form-select form-select-sm" id="specificSizeSelect" name="journey_date" value="<?= esc(set_value('journey_date')); ?>">
                                                        <option selected disabled>Choose...</option>
                                                        <?php if ($tours['tours_j1']) : ?>
                                                            <option value=<?= $tours['tours_j1'] ?>><?= $tours['tours_j1'] ?></option>
                                                        <?php endif ?>
                                                        <?php if ($tours['tours_j2']) : ?>
                                                            <option value="<?= $tours['tours_j2'] ?>"><?= $tours['tours_j2'] ?></option>
                                                        <?php endif ?>
                                                        <?php if ($tours['tours_j3']) : ?>
                                                            <option value="<?= $tours['tours_j3'] ?>"><?= $tours['tours_j3'] ?></option>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label class="form-label" for="people">Number of
                                                        Travelers</label>
                                                    <input type="number" class="form-control form-control-sm" name="people" id="email" value="<?= esc(set_value('people')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"><?= esc(set_value('message')); ?></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-orange">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="visit-sec">
        <div class="container">
            <div class="sec-head">
                <h2>Places to visit</h2>
            </div>
            <div id="place-visit-slider" class="owl-carousel">
                <?php foreach ($places as $place) : ?>
                    <div class="place-visit-box">
                        <img src="<?= base_url('uploads/tours/places/' . $place['cover_image']) ?>" class="img-fluid" alt="">
                        <div class="place-visit-box-text">
                            <?= $place['name'] ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>



    <section class="trip-map-sec">
        <div class="container">
            <div class="sec-head">
                <h2>Trip Map</h2>
            </div>
            <div class="row">
                <div class="col-lg-7 p-0">
                    <div class="trip-map-box">
                        <p><?= $tours['tours_tmap_desc'] ?></p>
                        <!-- <a>See more</a> -->
                    </div>
                </div>
                <div class="col-lg-5 p-0">
                    <div class="trip-map-img">
                        <img src="<?= base_url('uploads/tours/tripmaps/' . $tours['tours_tmap_image']) ?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="itinerary-sec">
        <div class="container">
            <div class="sec-head d-flex align-items-center justify-content-between">
                <h2>Itinerary</h2>
                <!-- <a href="">See All</a> -->
            </div>
            <div class="row">

                <?php if (!empty($iti)) : ?>
                    <?php foreach ($iti as $key => $iti) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="itinerary-box">
                                <div class="itinerary-box-img position-relative">
                                    <img src="<?= base_url('uploads/tours/itineraries/' . $iti['cover_image']) ?>" class="img-fluid" alt="">
                                    <div class="tours-img-meta">
                                        <div class="interest-img-meta-tag">
                                            <h6><?= $iti['day'] ?></h6>
                                            <p class="interest-desc"><?= $iti['destinations'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="itinerary-box-hover-box">
                                    <h6><?= $iti['day'] ?></h6>
                                    <p><?= $iti['description'] ?></p>
                                    <div class="tours-img-meta-tag">
                                        <?php if ($iti['breakfast'] === 'yes') : ?>
                                            Breakfast
                                        <?php endif ?>
                                        <?php if ($iti['lunch'] === 'yes') : ?>
                                            , Lunch
                                        <?php endif ?>

                                        <?php if ($iti['dinner'] === 'yes') : ?>
                                            , Dinner
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="itinerary-box">
                            <div class="itinerary-box-img position-relative">
                                <img src="https://tse1.mm.bing.net/th?id=OIP.yTrt1w18n-bqLf_bw24PTAHaJn&pid=Api" class="img-fluid" alt="">
                                <!-- <div class="tours-img-meta">
                                    <div class="interest-img-meta-tag">
                                        <h6>Day 1</h6>
                                        <p class="interest-desc">Kolkata - Nairobi</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>



    <section class="visit-sec">
        <div class="container">
            <div class="sec-head">
                <h2>Accommodation</h2>
            </div>
            <div id="accommodation-slider" class="owl-carousel">
                <?php if (!empty($accomodation)) : ?>
                    <?php foreach ($accomodation as $acc) : ?>
                        <div class="place-visit-box">
                            <img src="<?= base_url('uploads/tours/accomodation/' . $acc['cover_image']) ?>" class="img-fluid" alt="">
                            <div class="place-visit-box-text d-flex align-items-center justify-content-between">
                                <b><?= $acc['destination'] ?></b>
                                <p><?= $acc['hotel'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="place-visit-box">
                        <img src="https://tse1.mm.bing.net/th?id=OIP.yTrt1w18n-bqLf_bw24PTAHaJn&pid=Api" class="img-fluid" alt="">
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>