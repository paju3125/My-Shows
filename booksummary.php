<?php
$name = $_POST['movie'];

$con = mysqli_connect("localhost", "root", "", "myshows");
$query = "select price from movies where moviename = '" . $name . "' limit 1";
$res = mysqli_query($con, $query);

$data = mysqli_fetch_array($res);
$price = $data['price'];

$date = strtotime($_POST['date']);
$time = explode(' - ', $_POST['time']);
$gold = $_POST['gold'];
$silver = $_POST['silver'];
$platinum = $_POST['platinum'];

$newdate = date("l, d M Y", $date);

$theatre = $_COOKIE["location"];

if ($theatre == "My Cinema") {
    $location = "Bhistbagh Chowk, pipeline road, Ahmednagar";
} else if ($theatre == "Chitra Multiplex") {
    $location = "Narayan Doho, M.I.R.C Ahmednagar, Ahmednagar";
} else if ($theatre == "The Annexe") {
    $location = "11, Nagarwalla Road, Armoured Corps Center, Ahmednagar";
} else if ($theatre == "Shivam Plasa") {
    $location = "Wadia Park Rd, Maliwada, Ahmednagar";
} else if ($theatre == "Madhyan Multiplex") {
    $location = "999, Telikhunt, Telikhunt, Ahmednagar";
} else if ($theatre == "Asha Multiplex") {
    $location = "Mg Road Near Kotwali Police Headquarter, Nalegaon, Ahmednagar";
}

$h2 = "";
$h4 = "<br><br>";
$total = 0;
$allseats = "";

$h2 .= $time[0] . "<hr style='background-color: #fff;height:.2px;'>";

if (!empty($silver)) {
    $h2 .= "<span style='color: #d5d5d7;'>Silver</span> - <span class='seatno'>" . $silver . "</span> <br>";
    $h4 .= $price . " X " . count(explode(",", $silver)) . "<br>";
    $total += $price * count(explode(",", $silver));
    $allseats .= $silver;
}
if (!empty($gold)) {
    $h2 .= "<span style='color: rgb(255,215,0);'>Gold</span> - <span class='seatno'>" . $gold . "</span> <br>";
    $h4 .= ($price + 30) . " X " . count(explode(",", $gold)) . "<br>";
    $total += ($price + 30) * count(explode(",", $gold));
    $allseats .= ",".$gold;
}
if (!empty($platinum)) {
    $h2 .= "<span style='color: rgb(229, 228, 226);'>Platinum</span> - <span class='seatno'>" . $platinum . "</span> <br>";
    $h4 .= ($price + 60) . " X " . count(explode(",", $platinum));
    $total += ($price + 60) * count(explode(",", $platinum));
    $allseats .= ",".$platinum;
}

$user = $_COOKIE['username'];
$query = "select coupon from user where username = '" . $user . "' limit 1";
$res = mysqli_query($con, $query);
$list = '';

if($data = mysqli_fetch_assoc($res)) {
    if(empty($data['coupon'])) {
        $list = "";
    } else {
        $codes = explode(',', $data['coupon']);

        foreach ($codes as $key => $value) {
            $code = explode('-', $value);

            $list .='<li>
                     <h3>'.$code[0].'</h3>
                     <h3>'.$code[1].'%</h3>
                     <h3>'.$code[2].'</h3>
                     <p title="Copy to Clipboard"> <i class="icofont-ui-copy"></i> </p>
                     </li>';
        }
    }
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

    <center>
        <div id="message"></div>
    </center>

    <section class="code-block">
        <div class="pull-code">
            <img src="assets/img/gift.svg" alt="Check Code" class="toggle-code" />
            <i class="icofont-ui-close toggle-code d-none"></i>
        </div>
        
        <div class="code-content">
            <div class="code-list2">
                <ul>
                    <li>
                        <h4>Code</h4>
                        <h4>Discount</h4>
                        <h4>Quantity</h4>
                        <p></p>
                    </li>
                    
                    <?php echo $list; ?>
            
                </ul>
            </div>
        </div>
    </section>

    <!-- ======= Summary Start ======= -->

    <section id="book-summary" class="services4">
        <div class="outer-con">
            <div class="summary">

                <div class="heading">
                    <h4>Book Summary</h4>
                </div>

                <div class="main-info">
                    <h4 class="mname">
                        <script>
                            document.write(sessionStorage.getItem('moviename'))
                        </script>
                    </h4>

                    <div class="grid">
                        <div class="multiplex fl">
                            <h2>Theatre</h2>
                            <h4> <?php echo $theatre; ?> </h4>
                        </div>
                        <div class="loc fl">
                            <h2>Location</h2>
                            <h4> <?php echo $location; ?> </h4>
                        </div>
                        <div class="date fl">
                            <h2>Date</h2>
                            <h4> <?php echo $newdate; ?> </h4>
                        </div>
                        <div class="time fl">
                            <h2>Time</h2>
                            <h4> <?php echo $time[1]; ?> </h4>
                        </div>
                        <div class="seat-con">
                            <h2>Seat</h2>
                            <div class="seat-box fl">
                                <h2> <?php echo $h2; ?> </h2>
                                <h4> <?php echo $h4; ?> </h4>
                            </div>
                        </div>

                        <hr>
                        <div class="sub-total fl">
                            <h2>Sub - Total</h2>
                            <h4>Rs. <?php echo $total; ?></h4>
                        </div>
                    </div>

                    <div class="coupon">
                        <input type="text" maxlength="7" id="coupon-code" Placeholder="Enter Coupon Code">
                        <img src="assets/img/gift.svg" alt="coupon-icon" />
                        <button id="apply-coupon"><span>Apply</span></button>
                    </div>
                    <hr>
                    <div class="total">
                        <button>
                            <h2>Payable Amount</h2>
                            <svg height="512pt" viewBox="0 -77 512 512" width="512pt"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m292.246094 357.222656v-81.195312h-163.1875v-194.832032h163.1875v-81.195312l219.753906 178.613281zm0 0"
                                    fill="white" />
                                <g fill="lightgray">
                                    <path
                                        d="m16.234375 276.027344c-8.960937 0-16.234375-7.273438-16.234375-16.234375v-162.359375c0-8.964844 7.273438-16.238282 16.234375-16.238282 8.964844 0 16.238281 7.273438 16.238281 16.238282v162.359375c0 8.960937-7.273437 16.234375-16.238281 16.234375zm0 0" />
                                    <path
                                        d="m81.179688 276.027344c-8.960938 0-16.234376-7.273438-16.234376-16.234375v-162.359375c0-8.964844 7.273438-16.238282 16.234376-16.238282 8.960937 0 16.234374 7.273438 16.234374 16.238282v162.359375c0 8.960937-7.273437 16.234375-16.234374 16.234375zm0 0" />
                                    <path d="m292.246094 357.222656v-81.195312h-163.1875v-97.414063h382.941406zm0 0" />
                                </g>
                            </svg>
                            <h2>Rs.<?php echo $total; ?></h2>
                        </button>
                    </div>
                </div>
            </div>
    </section>

    <!-- ======= Summary End ======= -->

    <!-- ======= Payment Start ======= -->

    <section id="payment" class=".services5">
        <div class="container py-5">
            <!-- For demo purpose -->
            <div class="row mb-4 mt-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="heading">Payment Form</h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="bg-black shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card"
                                            class="nav-link active ">
                                            <img src="assets/img/master-card.svg" />
                                        </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#phonepe" class="nav-link ">
                                            <img src="assets/img/phonepe-logo.png" />
                                        </a></li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#phonepe" class="nav-link ">
                                            <img src="assets/img/google-pay.png" />
                                        </a></li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link ">
                                            <img src="assets/img/digital-banking.png" /> </a> </li>
                                </ul>
                            </div>
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form role="form" onsubmit="event.preventDefault()">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name"
                                                required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber"
                                                    placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span
                                                        class="input-group-text text-muted"> <i
                                                            class="fab fa-cc-visa mx-1"></i> <i
                                                            class="fab fa-cc-mastercard mx-1"></i> <i
                                                            class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM"
                                                            name="" class="form-control" required> <input type="number"
                                                            placeholder="YY" name="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                        title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"> <button type="button"
                                                class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment
                                            </button>
                                    </form>
                                </div>
                            </div> <!-- End -->
                            <!-- Paypal info -->
                            <div id="phonepe" class="tab-pane fade pt-3">
                                <form role="form" onsubmit="event.preventDefault()">
                                    <div class="form-group">
                                        <label for="username">
                                            <h6>UPI</h6>
                                        </label>
                                        <input type="text" name="upi" placeholder="UPI Code" required
                                            class="form-control">
                                        <button type="button" class="btn btn-primary mt-4"><i
                                                class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button>
                                    </div>
                                </form>

                                <p class="text-muted">Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be
                                    redirected back to the website to view details of your order. </p>

                            </div> <!-- End -->
                            <!-- bank transfer info -->
                            <div id="net-banking" class="tab-pane fade pt-3">
                                <div class="form-group "> <label for="Select Your Bank">
                                        <h6>Select your Bank</h6>
                                    </label> 
                                    <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>--Please select your Bank--</option>
                                        <option>Bank 1</option>
                                        <option>Bank 2</option>
                                        <option>Bank 3</option>
                                        <option>Bank 4</option>
                                        <option>Bank 5</option>
                                        <option>Bank 6</option>
                                        <option>Bank 7</option>
                                        <option>Bank 8</option>
                                        <option>Bank 9</option>
                                        <option>Bank 10</option>
                                    </select> </div>
                                <div class="form-group">
                                    <p> <button type="button" class="btn btn-primary "><i
                                                class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be
                                    redirected back to the website to view details of your order. </p>
                            </div> <!-- End -->
                            <!-- End -->
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- ======= Payment End ======= -->

    <form action="ticket.php" name="dataForTicket" id="dataForTicket" method="post">
        <input type="hidden" name="date" class="date" value="<?php echo $newdate; ?>">
        <input type="hidden" name="time" class="time" value="<?php echo $_POST["time"]; ?>">
        <input type="hidden" name="silver" class="silver" value="<?php echo $silver; ?>">
        <input type="hidden" name="gold" class="gold" value="<?php echo $gold; ?>">
        <input type="hidden" name="platinum" class="platinum" value="<?php echo $platinum; ?>">
        <input type="hidden" name="location" class="location" value="<?php echo $location; ?>">
        <input type="hidden" name="movie" id="moviename" value="<?php echo $name; ?>">
        <input type="hidden" name="total" id="total" value="<?php echo $total; ?>">
    </form>

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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function () {

            <?php if(empty($list)) { ?>                
                $(".code-block").css({
                    display: "none"
                });
            <?php } ?>


            $("#book-summary").show();
            $("#payment").hide();
        });

        $(".total button").on("click", function () {
            $("#book-summary").hide();
            $("#payment").show();

            $(".code-block").css({
                display: "none"
            });
        });

        // Payment Button Click
        $("#payment .btn-primary").on("click", function () {
            $.ajax({
                url: 'getdata.php',
                type: 'post',
                data: {
                    str: 'updateSeats',
                    name: '<?php echo $name ?>',
                    date: '<?php echo $_POST['date'] ?>',
                    time: '<?php echo $time[1] ?>',
                    screen: '<?php echo $time[0] ?>',
                    seats: '<?php echo $allseats ?>'
                },
                success: function (data) {
                    $("#dataForTicket").submit();
                }
            });

            if ($(".coupon #coupon-code").val() != "") {
                $.ajax({
                    url: 'getdata.php',
                    type: 'post',
                    data: {
                        str: 'updateCoupon',
                        code: $(".coupon #coupon-code").val()
                    },
                    success: function(data) {
                        console.log(data)
                    }
                });
            }
        });

        $("#book-summary #apply-coupon").on("click", function () {


            if ($("#book-summary #apply-coupon span").text() == "Remove") {
                $("#book-summary #apply-coupon span").text("")
                $("#book-summary #apply-coupon span").addClass("spinner-border")
                setTimeout(() => {
                    $("#book-summary #apply-coupon span").text("Apply")
                    $("#book-summary #apply-coupon span").removeClass("spinner-border")

                    $("#book-summary .total button h2 ").eq(1).html("Rs." + <?php echo $total; ?> );
                    $("#book-summary #coupon-code").prop("readonly", false)
                    $("#book-summary #coupon-code").val("")
                }, 1000);
                return;
            }

            $("#book-summary #apply-coupon span").text("");
            $("#book-summary #apply-coupon span").addClass("spinner-border");

            if ($("#coupon-code").val() == "") {

                setTimeout(() => {
                    $("#book-summary #apply-coupon span").text("Apply")
                    $("#book-summary #apply-coupon span").removeClass("spinner-border")
                }, 1000);
                let message = document.getElementById('message');

                message.innerHTML = `<div class="alert alert-danger fade show" role="alert">
                                <strong  mx-100>Please enter coupon code!</strong>
                           </div>`;
                setTimeout(function () {
                    message.innerHTML = ''
                }, 3000);
                return;
            }


            $.ajax({
                url: 'getdata.php',
                type: 'post',
                data: {
                    str: 'getcouponcode',
                    code: $("#coupon-code").val(),
                    price: '<?php echo $total; ?>'
                },
                success: function (data) {

                    setTimeout(() => {
                        $("#book-summary #apply-coupon span").removeClass("spinner-border");
                        
                        if (data == "Invalid Coupon Code") {
                            $("#book-summary #apply-coupon span").text("Apply");
                            let message = document.getElementById('message');

                            message.innerHTML = `<div class="alert alert-danger fade show" role="alert">
                                <strong  mx-100>Invalid Coupon Code</strong>
                           </div>`;
                            setTimeout(function () {
                                message.innerHTML = ''
                            }, 3000);
                        } else {
                            $("#book-summary .total button h2 ").eq(1).html("Rs." + data);
                            let message = document.getElementById('message');

                            message.innerHTML = `<div class="alert alert-success fade show" role="alert">
                                <strong  mx-100>Coupon Code is Applied...</strong>
                           </div>`;
                            setTimeout(function () {
                                message.innerHTML = ''
                            }, 3000);
                            $("#book-summary #coupon-code").prop("readonly", true)
                            $("#book-summary #apply-coupon span").text("Remove")

                        }
                    }, 1000);

                }
            });

        });

        $(".pull-code").on("click", function() {
            $(".pull-code .toggle-code").toggleClass("d-none");
            
            if($(".pull-code img").hasClass("d-none")) {
                $(".code-block").css({
                    transform: "translateX(0rem)"
                });
            } else {
                $(".code-block").css({
                    transform: "translateX(30rem)"
                });
            }
            
        });

        $(".code-content li p").on("click", function() {
            const str = $(this).parent('li').children('h3').first().text();
            const el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);

        });

        window.history.forward();
            function noBack() {
                window.history.forward();
            }
    </script>

</body>


</html>