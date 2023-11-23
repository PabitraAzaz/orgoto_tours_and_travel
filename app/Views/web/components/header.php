<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $this->renderSection('title') ?></title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/web/assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/web/assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/web/assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/web/assets/css/responsive.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/web/assets/icomoon/style.css') ?>">
</head>

<body>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="<?= base_url('public/web/assets/img/logo.png') ?>" alt="">
                    </a>
                    <button class="navbar-toggler x" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('#all-tours') ?>">All tours</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('#choose-sec') ?>">Why choose us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('#interest-sec') ?>">Interests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('#about-sec') ?>">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('#destinations-sec') ?>">Destinations</a>
                            </li>
                        </ul>

                        <div class="sub-nav-sec">
                            <a href="<?= base_url('contact-us') ?>" class="button btn-sky">Contact Us</a>
                        </div>

                    </div>
                </div>
            </nav>
        </header>