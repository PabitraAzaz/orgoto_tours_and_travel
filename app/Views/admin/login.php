<!doctype html>
<html lang="en">

<head>
    <title>Orgoto Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/login/style.css') ?>">



    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Adminstration Login</h2>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <?php $session = session() ?>
                        <?php if ($session->getFlashdata('msg') !== null) : ?>
                            <div class="alert alert-<?= $session->getFlashdata('msg')['type'] ?> alert-dismissible fade show d-flex justify-content-between" role="alert">
                                <div>
                                    <?= $session->getFlashdata('msg')['msg'] ?>
                                </div>
                                <div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
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
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($session->getFlashdata('error_msg') !== null) : ?>
                            <div class="alert alert-<?= $session->getFlashdata('error_msg')['type'] ?> alert-dismissible fade show d-flex justify-content-between" role="alert">
                                <div>
                                    <?= $session->getFlashdata('error_msg')['msg'] ?>
                                </div>
                                <div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </div>
                            </div>
                        <?php endif; ?>






                        <form action="<?php base_url('/admin') ?>" class="login-form" method="post">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="Password" name="password" required>
                            </div>
                            <!-- <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>