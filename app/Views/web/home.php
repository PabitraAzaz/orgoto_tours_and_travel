<?= $this->extend('web/components/assemble') ?>
<?= $this->section('title') ?>Home<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main>

    <section class="hero-sec home-hero" style="background-image: url(<?= base_url('public/web/assets/img/Herro banner.png') ?>);">
        <div class="container">
            <div class="hero-box">
                <div class="hero-mark" data-aos="fade-right" data-aos-duration="1500">
                    <img src="<?= base_url('public/web/assets/img/earth planet.png') ?>" class="img-fluid" alt="">
                    Explore the world
                </div>
                <h1 data-aos="fade-right" data-aos-duration="1500">Begin Your <span>Journey</span></h1>
                <p data-aos="fade-right" data-aos-duration="2000">Forem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent.</p>
                <a href="" class="button btn-sky" data-aos="fade-right" data-aos-duration="2500">Know More</a>
            </div>
        </div>
    </section>



    <section id="all-tours" class="home-all-tours-sec">
        <div class="container">
            <div class="sec-head">
                <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">All Tours</h2>
            </div>
            <div id="tours-slider" class="owl-carousel">
                <?php if (!empty($tours)) : ?>
                    <?php foreach ($tours as $key => $tour) : ?>
                        <div class="tours-slide-box">
                            <div class="tours-slide-img">
                                <img src="<?= base_url('uploads/tours/'  . $tour['tour_cover_image']) ?>" class="img-fluid" alt="">
                                <div class="tours-img-meta">
                                    <div class="tours-img-meta-day">
                                        <div class="day-num"><?= $tour['tours_duration'] ?></div>
                                        <div class="days">Days</div>
                                    </div>
                                    <div class="tours-img-meta-tag">
                                        <?= $tour['c_name'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tours-slide-content">
                                <h5><?= $tour['tours_title'] ?></h5>
                                <p><?= $tour['tours_sh_desc'] ?> </p>
                                <div class="tours-slide-meta">
                                    <p>
                                        <img src="<?= base_url('public/web/assets/img/Location.png') ?>" class="img-fluid" alt="">

                                        <?php $placesCount = 0; ?>
                                        <?php $remainingPlaces = []; ?>
                                        <?php foreach ($places as $place) : ?>
                                            <?php if ($tour['tours_id'] == $place['tours_id']) : ?>
                                                <?php
                                                if ($placesCount < 2) {
                                                    if ($placesCount > 0) {
                                                        echo ', '; // Add a comma separator
                                                    }
                                                    echo $place['name'];
                                                } else {
                                                    $remainingPlaces[] = $place['name'];
                                                }
                                                $placesCount++;
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php if (!empty($remainingPlaces)) : ?>
                                            <?php
                                            $remainingCount = count($remainingPlaces);
                                            echo " + $remainingCount";
                                            ?>
                                        <?php endif; ?>

                                    </p>
                                    <p>
                                        <img src="<?= base_url('public/web/assets/img/Cost.png') ?>" class="img-fluid" alt=""> Package start at - <b><?= $tour['tours_price'] ?> INR</b>
                                    </p>
                                </div>
                            </div>
                            <a href="<?= base_url('tour-details/' . $tour['tours_id']) ?>" class="button btn-orange w-100 py-3">Book Now</a>
                        </div>
                    <?php endforeach ?>

                <?php else : ?>
                    <div class="tours-slide-box">
                        <div class="tours-slide-img">
                            <img src="https://tse1.mm.bing.net/th?id=OIP.yTrt1w18n-bqLf_bw24PTAHaJn&pid=Api" class="img-fluid" alt="">
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>



    <section id="choose-sec" class="choose-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="choose-sec-img py-2" data-aos="fade-right" data-aos-duration="1500">
                        <img src="<?= base_url('public/web/assets/img/choose-img.png') ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="choose-sec-content py-2" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                        <div class="sec-head mb-3">
                            <h2>Why Choose us</h2>
                        </div>
                        <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="interest-sec" id="interest-sec">
        <div class="container">
            <div class="sec-head">
                <h2>Interests</h2>
            </div>

            <?php if (!empty($tours)) : ?>
                <div class="tile" id="tile-1">
                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <?php foreach ($categories as $cat) : ?>
                                <a class="nav-link <?php echo ($cat === reset($categories)) ? 'active' : ''; ?>" id="nav-<?php echo strtolower($cat['slug']); ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo strtolower($cat['slug']); ?>" type="button" role="tab" aria-controls="nav-<?php echo strtolower($cat['slug']); ?>" aria-selected="true"><?php echo $cat['name']; ?></a>
                            <?php endforeach ?>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <?php foreach ($categories as $cat) : ?>
                            <div class="tab-pane fade <?php echo ($cat === reset($categories)) ? 'active show' : ''; ?>" id="nav-<?php echo strtolower($cat['slug']); ?>" role="tabpanel" aria-labelledby="nav-<?php echo strtolower($cat['slug']); ?>-tab">
                                <div id="<?php echo strtolower($cat['slug']); ?>-slider" class="owl-carousel">
                                    <?php foreach ($tours as $tour) : ?>
                                        <?php if ($tour['c_name'] === $cat['name']) : ?>
                                            <div class="interest-slide-box">
                                                <div class="interest-slide-img">
                                                    <img src="<?= base_url('uploads/tours/'  . $tour['tour_cover_image']) ?>" class="img-fluid" alt="">
                                                    <div class="tours-img-meta">
                                                        <div class="tours-img-meta-day">
                                                            <div class="day-num"><?= $tour['tours_duration'] ?></div>
                                                            <div class="days bg-sky">Days</div>
                                                        </div>
                                                        <div class="interest-img-meta-tag">
                                                            <h6><?= $tour['tours_title'] ?></h6>
                                                            <p class="interest-desc"><?= $tour['tours_sh_desc'] ?> </p>
                                                            <p>Package start at - <?= $tour['tours_price'] ?> INR</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url('tour-details/' . $tour['tours_id']) ?>" class="button btn-sky w-100">Book Now</a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach ?>

                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

            <?php else : ?>
                <div class="tours-slide-box">
                    <div class="tours-slide-img">
                        <img src="https://tse1.mm.bing.net/th?id=OIP.yTrt1w18n-bqLf_bw24PTAHaJn&pid=Api" class="img-fluid" alt="">
                    </div>
                </div>
            <?php endif ?>
    </section>



    <section id="about-sec" class="home-about-sec" style="background-image: url(<?= base_url('public/web/assets/img/Home Page  About us.png') ?>);">
        <div class="overlay2"></div>
        <div class="container">
            <div class="home-about-box">
                <h2>About Us</h2>
                <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
                <a href="<?= base_url('about-us') ?>" class="button btn-orange">Know More</a>
            </div>
        </div>
    </section>
    <section id="destinations-sec" class="destinations-sec">
        <div class="container">
            <div class="sec-head">
                <h2>Destinations</h2>
            </div>
            <div class="tile" id="tile-1">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <?php foreach ($continents as $index => $continent) : ?>
                            <a class="nav-link<?= $index === 0 ? ' active' : '' ?>" id="nav-<?= str_replace(" ", "", $continent) ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?= str_replace(" ", "", $continent) ?>" type="button" role="tab" aria-controls="nav-<?= str_replace(" ", "", $continent) ?>" aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"><?= ucfirst($continent) ?></a>
                        <?php endforeach; ?>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <?php foreach ($continents as $index => $continent) : ?>
                        <div class="tab-pane fade<?= $index === 0 ? ' active show' : '' ?>" id="nav-<?= str_replace(" ", "", $continent) ?>" role="tabpanel" aria-labelledby="nav-<?= str_replace(" ", "", $continent) ?>-tab">
                            <div id="<?= strtolower($continent) ?>-slider" class="owl-carousel">

                                <?php foreach ($tours as $tour) : ?>
                                    <?php if ($tour['continent'] === $continent) : ?>
                                        <div class="destination-item">
                                            <div class="destination-slider-box">
                                                <div class="destination-slider-image">
                                                    <img src="<?= base_url('uploads/tours/'  . $tour['tour_cover_image']) ?>" class="img-fluid" alt="">
                                                    <div class="tours-img-meta-day">
                                                        <div class="day-num"><?= $tour['tours_duration'] ?></div>
                                                        <div class="days">Days</div>
                                                    </div>
                                                </div>
                                                <div class="destination-slider-content">
                                                    <h6><?= $tour['tours_title'] ?></h6>
                                                    <p><?= $tour['tours_sh_desc'] ?></p>
                                                    <p>Package Start at - <?= $tour['tours_price'] ?> Rs</p>
                                                    <a href="<?= base_url('tour-details/' . $tour['tours_id']) ?>" class="button btn-orange">Know More</a>
                                                </div>
                                            </div>
                                            <div class="destination-slider-box">
                                                <div class="destination-slider-image">
                                                    <img src="<?= base_url('uploads/tours/'  . $tour['tour_cover_image']) ?>" class="img-fluid" alt="">
                                                    <div class="tours-img-meta-day">
                                                        <div class="day-num"><?= $tour['tours_duration'] ?></div>
                                                        <div class="days">Days</div>
                                                    </div>
                                                </div>
                                                <div class="destination-slider-content">
                                                    <h6><?= $tour['tours_title'] ?></h6>
                                                    <p><?= $tour['tours_sh_desc'] ?></p>
                                                    <p>Package Start at - <?= $tour['tours_price'] ?> Rs</p>
                                                    <a href="<?= base_url('tour-details/' . $tour['tours_id']) ?>" class="button btn-orange">Know More</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>
    </section>

    <section class="testimonial-sec">
        <div class="container">
            <div class="sec-head">
                <h2>What our customers say</h2>
                <p>Forem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent .</p>
            </div>
            <div id="testimonial-slider" class="owl-carousel">
                <?php if (!empty($reviews)) : ?>
                    <?php foreach ($reviews as $review) : ?>
                        <div class="testimonial-box">
                            <div class="testimonial-box-img">
                                <img src="<?= base_url('uploads/reviews/' . $review['image']) ?>" class="img-fluid" alt="">
                            </div>
                            <p><?= $review['message'] ?></p>
                            <h6><?= $review['name'] ?></h6>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </section>



</main>
<?= $this->endSection() ?>