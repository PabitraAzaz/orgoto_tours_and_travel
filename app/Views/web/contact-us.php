<?= $this->extend('web/components/assemble') ?>
<?= $this->section('title') ?>Contact Us<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main>
    <section class="hero-sec" style="background-image: url(<?= base_url('public/web/assets/img/contact-banner.jpg') ?>);">
        <!-- <div class="overlay"></div> -->
    </section>

    <section class="cntact-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row mb-5">
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-map-marker"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-phone"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-paper-plane"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-globe"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Website</span> <a href="#">yoursite.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Fill in the form to reach us</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
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


                                    <!-- <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                    </div> -->
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="<?= base_url('contact-us') ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="label" for="name">Full Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="label" for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label class="label" for="subject">Phone Number</label>
                                                    <input type="number" class="form-control" name="phone_no" id="phone_no" placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Message</label>
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="button-box-home pt-4">
                                                        <button type="submit" class="btn btn-sky">Submit Massege</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap w-100 py-5">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117928.4664905653!2d88.28604291413905!3d22.53175959723623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1694880754255!5m2!1sen!2sin" style="border:0; width: 100%; height: 450px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?= $this->endSection() ?>