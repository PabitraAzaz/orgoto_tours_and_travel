<?= $this->extend('web/components/assemble') ?>
<?= $this->section('title') ?>About Us<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <section class="hero-sec" style="background-image: url(<?= base_url('public/web/assets/img/Frame 13.png') ?>);">
        <div class="container">
            <div class="about-hero-box">
                <h1>About Us</h1>
                <p>Forem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent .</p>
            </div>
        </div>
    </section>
    <section class="about-desc-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-desc-conetent">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-desc-thumb">
                        <img src="<?= base_url('public/web/assets/img/about-thumb-1.png') ?>" class="img-fluid about-thumb1" alt="">
                        <img src="<?= base_url('public/web/assets/img/about-thumb-2.png') ?>" class="img-fluid about-thumb2" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hero-sec about-hero-curv" style="background-image: url(<?= base_url('public/web/assets/img/Rectangle 1634.png') ?>);">
        <div class="container">
            <div class="about-hero-box-down">
                <h3>Lorem ipsum dolor sit amet</h3>
                <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti sociosqu ad litora torquent per conubia Rorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus.</p>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>