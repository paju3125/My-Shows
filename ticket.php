<?php
$name = $_POST['movie'];

$con = mysqli_connect("localhost", "root", "", "myshows");
$query = "select * from movies where moviename = '" . $name . "' limit 1";
$res = mysqli_query($con, $query);

$data = mysqli_fetch_array($res);
$img = $data['image'];
$vt = $data['viewtype'];

$query = "select * from moviedetails where moviename = '" . $name . "' limit 1";
$res = mysqli_query($con, $query);

$data = mysqli_fetch_array($res);
$lang = $data['language'];

$date = $_POST['date'];
$time = explode(' - ', $_POST['time']);

$gold = $_POST['gold'];
$silver = $_POST['silver'];
$platinum = $_POST['platinum'];

$theatre = $_COOKIE["location"];
$location = $_POST['location'];

$h2 = "";

if (!empty($silver)) {
    $h2 .= "Silver - ". $silver." <br>";
}
if (!empty($gold)) {
    $h2 .= "Gold - ". $gold." <br>";
}
if (!empty($platinum)) {
    $h2 .= "Platinum - ". $platinum;
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>My Shows</title>

    <!-- Favicons -->
    <link href="assets/img/title.jpg" rel="icon">
    <link href="assets/img/title.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&family=Lobster&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/all.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header Start ======= -->

    <header id="header" class="fixed-top light" data-aos="zoom-out">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-xl-11 d-flex align-items-center justify-content-between">
                    <h1 class="logo" data-aos="fade-right" data-aos-delay="500"><a href="index.html"><i
                                class="icofont-ui-play icon-log"></i>MY SHOWS</a></h1>

                    <nav class="nav-menu d-none d-xl-block">
                        <ul>
                            <li class="active"><a href="index.html#home">Home</a></li>
                            <li><a href="index.html#popularmovies">Popular Movies</a></li>
                            <li><a href="index.html#latestmovies">Latest Movies</a></li>
                            <li><a href="index.html#oldmovies">Old Movies</a></li>
                            <li><a href="index.html#contact">Contact</a></li>

                            <a><i class="bx bx-sun togglemode"></i></a>
                            <a><i class="bx bx-moon togglemode d-none"></i></a>

                            <div class="searchbar d-flex align-items-center align-self-center">
                                <input type="text" placeholder="Search here..." class="searchtext">
                                <button class="searchbtn"><i class="icofont-search-2"></i></button>

                                <ul class="search-list">
                                </ul>
                            </div>

                        </ul>
                    </nav>

                    <div class="nav-profile" data-aos="fade-left" data-aos-delay="500">
                        <button><i class="icofont-login"></i> Login</button>

                        <div class="profile d-none"></div>
                        <div class="profilename d-none">
                            <span></span>
                            <p><i class="icofont-check-circled"></i> User</p>
                        </div>

                        <div class="userprofile">
                            <ul>
                                <li><img src="assets/img/boss.svg"></li>
                                <li>
                                    <h4></h4>
                                </li>
                                <li><span><i class="icofont-logout"></i> Logout</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- ======= Header End ======= -->

    <!-- ======= Ticket Start ======= -->

    <section class="bill" id="bill">
        <div class="container">
            <h4>TICKET</h4>

            <div id="Combo">
                <div class="icon-box1">
                    <h3>MY SHOWS</h3>
                    <div class="row">
                        <div class="col-lg-3">
                            <img src=" <?php echo $img; ?> " id="poster1" />
                        </div>

                        <div class="col-lg-9">
                            <ul>
                                <h2 class="mname"> <?php echo $name; ?> </h2>
                                <div class="other">
                                    <p> <?php echo $lang; ?> </p>
                                    <p> <?php echo $vt; ?> </p>
                                </div>
                                <p> <?php echo $time[1]; ?> </p>
                                <p> <?php echo $date; ?> </p>
                                <hr>
                                <p> <?php echo $theatre; ?> </p>
                                <p> <?php echo $location; ?> </p>
                            </ul>
                        </div>
                    </div>

                </div>


                <div class="icon-box2">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="screen"> <?php echo $time[0]; ?> </p>
                            <p class="allseats"> <?php echo $h2; ?> </p>
                            <p class="allseats" style="margin-top: 1rem;font-weight:bold">
                                <?php echo "Amount : ". $_POST['total']; ?> </p>
                        </div>

                        <div class="col-lg-4">
                            <img src="assets/img/qr.jpg" id="qr">
                        </div>
                    </div>
                </div>

                <p id="thanks">Thank you for coming ! Visit Again <i class="icofont-simple-smile"></i></p>
            </div>
        </div>

        <a href="#" class="buttonDownload" onclick="generate();">Download Ticket</a>
    </section>

    <!-- ======= Ticket End ======= -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

    <nav class="mobile-nav d-xl-none light">
        <ul>
            <div class="searchbar d-flex align-items-center align-self-center">
                <input type="text" placeholder="Search here..." class="searchtext">
                <button class="searchbtn"><i class="icofont-search-2"></i></button>
            </div>

            <div class="togicon">
                <a><i class="bx bx-sun togglemode"></i></a>
                <a><i class="bx bx-moon togglemode d-none"></i></a>
            </div>

            <li class="active"><a href="#home">Home</a></li>
            <li><a href="#popularmovies">Popular Movies</a></li>
            <li><a href="#latestmovies">Latest Movies</a></li>
            <li><a href="#oldmovies">Old Movies</a></li>
            <li class="theatres"><a>Location</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"
        integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ=="
        crossorigin="anonymous"></script>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        // For Downloading The Bill
        (function (exports) {


            function screenshotPage() {
                var wrapper = document.getElementById('Combo');
                html2canvas(wrapper, {
                    onrendered: function (canvas) {
                        canvas.toBlob(function (blob) {
                            saveAs(blob, 'Bill.png');

                        });
                    }
                });
            }

            function addOnPageLoad_() {
                window.addEventListener('DOMContentLoaded', function (e) {
                    var scrollX = document.documentElement.dataset.scrollX || 0;
                    var scrollY = document.documentElement.dataset.scrollY || 0;
                    window.scrollTo(scrollX, scrollY);
                });
            }

            function generate() {
                screenshotPage();
            }

            exports.screenshotPage = screenshotPage;
            exports.generate = generate;
        })(window);
    </script>


</body>


</html>