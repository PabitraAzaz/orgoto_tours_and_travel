<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orgoto Tours|Thank You; </title>

    <link rel="stylesheet" href="<?php echo base_url('assets/web/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/web/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/web/css/responsive.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/web/icomoon/style.css') ?>">



    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/icomoon/style.css"> -->
    <script type="text/javascript">
        var count = 5; // Timer
        var redirect = "<?= base_url('/') ?>"; // Target URL
        function countDown() {
            var timer = document.getElementById("timer"); // Timer ID
            if (count > 0) {
                count--;
                timer.innerHTML = count; // Timer Message
                setTimeout("countDown()", 1000);
            } else {
                window.location.href = redirect;
            }
        }
    </script>
    <style>
        .thank-you-sec {
            background-color: #fcf8ef;
            min-height: 100vh;
        }

        .thank-you-box {
            padding: 35px 0;
            text-align: center;
        }

        .thank-you-img img {
            max-width: 250px;
            height: 250px;
        }

        .thank-you-text {
            padding-top: 25px;
            max-width: 650px;
            margin: 0 auto;
        }

        .thank-you-text h1 {
            color: var(--black);
            font-size: 50px;
            font-weight: 300;
            letter-spacing: 3px;
        }

        .countdown-box {
            padding-top: 25px;
        }

        .countdown-box h3 {
            color: var(--black);
        }

        .countdown-box h2 {
            margin-bottom: 0;
            font-size: 50px;
            line-height: 50px;
            color: var(--black);
        }

        .countdown-box span {
            line-height: 0;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <section class="thank-you-sec">
            <div class="container">
                <div class="thank-you-box">
                    <div class="thank-you-img">
                        <img src="https://img.freepik.com/premium-photo/thank-you-card-blooming-spring-branch-with-flowers_230573-2574.jpg?size=1024&ext=jpg&ga=GA1.1.1603580598.1661931233&semt=ais" class="img-fluid" alt="">
                    </div>
                    <div class="thank-you-text">
                        <h1>THANK YOU</h1>
                        <p>Thanks for booking <?= $tour['title'] ?>. Wee Will contact you soon!</p>
                        <p><b>Stay Tuned</b></p>
                        <div class="countdown-box">
                            <h3>You will be redirect back to Home page</h3>
                            <h2 id="timer">
                                <script type="text/javascript">
                                    countDown();
                                </script>
                            </h2>
                            <span>Seconds</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>