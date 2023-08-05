<?PHP

session_start();

if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) {
    die('Please Login First ! <a href="index.html">Go to home page</a> and login...');
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
    <link href="assets/css/admin.css" rel="stylesheet" />

</head>

<body onload="defaultTab('couponCode')">

    <!-- ======= Header Start ======= -->

    <header id="header" class="fixed-top">
        <h1 class="logo" data-aos="fade-right"><a href="index.html"><i class="icofont-ui-play icon-log"></i>MY SHOWS</a>
        </h1>
        <span class="sideMenu" data-aos="zoom-in" data-aos-delay="300">&#9776;</span>

        <nav class="nav-menu">
            <div data-aos="fade-left">
                <ul>
                    <li><a><i class="ri-mail-open-line"></i></a></li>
                    <li class="profile-dropdown">
                        <a>
                            <img src="assets/img/user.svg" data-aos="zoom-out" data-aos-delay="300">
                            <span><?php echo $_SESSION['user']; ?></span>
                        </a>

                        <div class="userprofile">
                            <ul>
                                <li><img src="assets/img/user.svg" class="m-auto"></li>
                                <li>
                                    <h4 class="m-auto"><?php echo $_SESSION['user']; ?></h4>
                                </li>
                                <li><button class="m-auto"><i class="icofont-logout"></i> Logout</button></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- ======= Header End ======= -->

    <!-- ======= Vertical Navigation Bar ======= -->

    <aside class="main-sidebar active">
        <section class="sidebar" data-aos="fade-right">
            <div class="closebtn" data-aos="fade-right" data-aos-delay="300"><i class="icofont-close"></i></div>
            <div class="user-panel">
                <img src="assets/img/user.svg" alt="Admin Profile">
                <div class="info">
                    <h3><?php echo $_SESSION['user']; ?></h3>
                    <p data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i>Admin</p>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active"><a href="#home">Home</a></li>
                <li><a href="#mainslider">Main Slider</a></li>
                <li><a href="#latestmovies">Latest Movies</a></li>
                <li><a href="#oldmovies">Old Movies</a></li>
                <li><a href="#midslider">Mid Slider</a></li>
                <li><a href="#advanced">Advanced</a></li>
            </ul>
        </section>
    </aside>

    <!-- ======= Vertical Navigation Bar ======= -->

    <!-- ======= Home Section ======= -->

    <section id="home" class="services">

        <div class="section-title">
            <h4 data-aos="fade-left">Dashboard</h4>
        </div>
        <hr>

        <div class="dashcon">
            <div class="dashbox" data-aos="fade-right">
                <div class="info">
                    <p>Users</p>
                    <h2><?php echo getdashbox("user"); ?></h2>
                </div>
                <div class="ico"><i class="icofont-users"></i></div>
            </div>

            <div class="dashbox" data-aos="zoom-out">
                <div class="info">
                    <p>Multiplex</p>
                    <h2>6</h2>
                </div>
                <div class="ico"><i class="icofont-building-alt"></i></div>
            </div>

            <div class="dashbox" data-aos="zoom-out">
                <div class="info">
                    <p>Movies</p>
                    <h2><?php echo getdashbox("movies"); ?></h2>
                </div>
                <div class="ico"><i class="icofont-video-clapper"></i></div>
            </div>

            <div class="dashbox" data-aos="fade-left">
                <div class="info">
                    <p>Tickets Booked</p>
                    <h2>
                        <?php
                        $content = countTickets();
                        echo $content;
                        ?>
                    </h2>
                </div>
                <div class="ico"><i class="icofont-ticket"></i></div>
            </div>
        </div>

        <div class="line">
            <h3>
                <marquee Scrollamount=15> <?php echo getline(); ?> </marquee>
            </h3>
        </div>

        <table>

            <tr class="title">
                <th>
                    <h4>poster</h4>
                </th>
                <th>
                    <h4>Movies</h4>
                </th>
                <th>
                    <h4>Rating</h4>
                </th>
                <th>
                    <h4>Last Date</h4>
                </th>
            </tr>

        </table>

        <div class="dashtable">

            <table>

                <?php 
                    $content = getdashtable(); 
                    echo $content;
                ?>

            </table>
        </div>

    </section>

    <!-- ======= Home Section End ======= -->

    <!-- ======= Mainslider Section Start ======= -->

    <section id="mainslider" class="services">

        <div class="section-title">
            <h4>Main Slider</h4>
        </div>
        <hr>

        <div class="maincon">
            <?php echo getmainslider(); ?>

            <div class="addbox">
                <i class="icofont-ui-add" title="Add More Slides"></i>
                <h4>Add More</h4>
            </div>
        </div>

        <form name="mainform" id="mainform" method="POST" action="admindata.php" enctype="multipart/form-data">
            <input type="file" name="mainfile" id="mainfile" accept="image/*" onchange="submit('#mainform')">
            <input type="hidden" name="str" id="str">
        </form>

    </section>

    <!-- ======= Mainslider Section End ======= -->

    <!-- ======= Latest Movies Section Start ======= -->

    <section id="latestmovies" class="services">

        <div class="section-title">
            <h4>Latest Movies</h4>
        </div>
        <hr>

        <div class="moviecon">

            <?php echo getmovies('Latest') ?>

            <div class="addbox">
                <i class="icofont-ui-add" title="Add More Slides"></i>
                <h4>Add More</h4>
            </div>
        </div>

    </section>

    <!-- ======= Latest Movies Section End ======= -->

    <!-- ======= Old Movies Section Start ======= -->

    <section id="oldmovies" class="services">

        <div class="section-title">
            <h4>Old Movies</h4>
        </div>
        <hr>

        <div class="moviecon">

            <?php echo getmovies('Old') ?>

            <div class="addbox">
                <i class="icofont-ui-add" title="Add More Slides"></i>
                <h4>Add More</h4>
            </div>
        </div>

    </section>

    <!-- ======= Old Movies Section End ======= -->

    <!-- ======= Midslider Section Start ======= -->

    <section id="midslider" class="services">

        <div class="section-title">
            <h4>Mid Slider</h4>
        </div>
        <hr>

        <div class="maincon">

            <?php echo getmidslider(); ?>

            <div class="addbox">
                <i class="icofont-ui-add" title="Add More Slides"></i>
                <h4>Add More</h4>

                <div class="editform">
                    <form id="editform1" name="editform1" method="Post" action="admindata.php"
                        enctype="multipart/form-data" autocomplete="on">
                        <div class="group">
                            <label for="moviename">Movie Name</label>
                            <input type="text" name="moviename" required>
                        </div>
                        <div class="group">
                            <label for="image">Image</label>
                            <input type="file" accept="image/*" name="mainfile" required>
                        </div>
                        <div class="group">
                            <label for="trailer">Trailer</label>
                            <input type="url" name="trailer" required>
                        </div>
                        <div class="group">
                            <label for="genre">Genre</label>
                            <input type="text" name="genre" required>
                        </div>
                        <input type="hidden" name="str" value="addmidslide">
                        <input type="submit" value="Add Slide">

                        <div class="closeform" style="transform: scale(0.2);transform-origin: top right;"><i
                                class="icofont-ui-close"></i></div>

                    </form>
                </div>
            </div>

        </div>

    </section>

    <!-- ======= Midslider Section End ======= -->

    <!-- ======= Movie Form Start ======= -->

    <section id="editmovieform" class="services">
    </section>

    <!-- ======= Movie Form End ======= -->

    <!-- ======= Movie Form Start ======= -->

    <section id="addmovieform" class="services">
        <div class="section-title">
            <h4>Add Movie</h4>
        </div>
        <hr>

        <div class="moviecon">
            <form class="movieform" name="addmovie" method="POST" action="admindata.php" enctype="multipart/form-data"
                autocomplete="on" novalidate>
                <div class="group">
                    <label for="moviename">Movie Name</label>
                    <input type="text" name="moviename" id="moviename" placeholder="Movie Name" autofocus>
                </div>

                <div class="group">
                    <label for="mainfile">Poster</label>
                    <input type="file" name="mainfile" id="mainfile" accept="image/*">
                </div>

                <div class="group">
                    <label for="trailer">Trailer</label>
                    <input type="url" name="trailer" id="trailer" placeholder="Trailer Url">
                </div>

                <div class="group check">
                    <label for="genre">Genre</label>

                    <div class="checkbox">
                        <input type="checkbox" name="genre" id="Action" value="Action">
                        <label for="Action"><span class="icon"></span> Action</label>

                        <input type="checkbox" name="genre" id="Adventure" value="Adventure">
                        <label for="Adventure"><span class="icon"></span> Adventure</label>

                        <input type="checkbox" name="genre" id="Animation" value="Animation">
                        <label for="Animation"><span class="icon"></span> Animation</label>

                        <input type="checkbox" name="genre" id="Comedy" value="Comedy">
                        <label for="Comedy"><span class="icon"></span> Comedy</label>

                        <input type="checkbox" name="genre" id="Crime" value="Crime">
                        <label for="Crime"><span class="icon"></span> Crime</label>

                        <input type="checkbox" name="genre" id="Drama" value="Drama">
                        <label for="Drama"><span class="icon"></span> Drama</label>

                        <input type="checkbox" name="genre" id="Family" value="Family">
                        <label for="Family"><span class="icon"></span> Family</label>

                        <input type="checkbox" name="genre" id="Historical" value="Historical">
                        <label for="Historical"><span class="icon"></span> Historical</label>

                        <input type="checkbox" name="genre" id="Horror" value="Horror">
                        <label for="Horror"><span class="icon"></span> Horror</label>

                        <input type="checkbox" name="genre" id="Romance" value="Romance">
                        <label for="Romance"><span class="icon"></span> Romance</label>

                        <input type="checkbox" name="genre" id="ScienceFiction" value="Science Fiction">
                        <label for="ScienceFiction"><span class="icon"></span> Science Fiction</label>

                        <input type="checkbox" name="genre" id="Sport" value="Sport">
                        <label for="Sport"><span class="icon"></span> Sport</label>

                        <input type="checkbox" name="genre" id="Thriller" value="Thriller">
                        <label for="Thriller"><span class="icon"></span> Thriller</label>

                        <input type="checkbox" name="genre" id="Western" value="Western">
                        <label for="Western"><span class="icon"></span> Western</label>
                    </div>
                </div>

                <div class="group">
                    <label for="release">Release Date</label>
                    <input type="date" name="release" id="release" required>
                </div>

                <div class="group">
                    <label for="expiry">Last Date</label>
                    <input type="date" name="expiry" id="expiry" required>
                </div>

                <div class="group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price" min="80" max="300" required>
                </div>

                <div class="group">
                    <label for="screen1">Screen 1</label>
                    <select name="time1[]" id="screen1" size="7" multiple required>
                        <option value="" selected disabled>Select Time</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="03:00 PM">03:00 PM</option>
                        <option value="06:00 PM">06:00 PM</option>
                        <option value="08:30 PM">08:30 PM</option>
                        <option value="11:00 PM">11:00 PM</option>
                    </select>
                </div>

                <div class="group">
                    <label for="screen2">Screen 2</label>
                    <select name="time2[]" id="screen2" size="7" multiple required>
                        <option value="" selected disabled>Select Time</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="03:00 PM">03:00 PM</option>
                        <option value="06:00 PM">06:00 PM</option>
                        <option value="08:30 PM">08:30 PM</option>
                        <option value="11:00 PM">11:00 PM</option>
                    </select>
                </div>

                <div class="group">
                    <label for="screen3">Screen 3</label>
                    <select name="time3[]" id="screen3" size="7" multiple required>
                        <option value="" selected disabled>Select Time</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="03:00 PM">03:00 PM</option>
                        <option value="06:00 PM">06:00 PM</option>
                        <option value="08:30 PM">08:30 PM</option>
                        <option value="11:00 PM">11:00 PM</option>
                    </select>
                </div>

                <div class="group radio1">
                    <label for="language">Language</label>

                    <div class="radiobtn">
                        <input type="radio" name="language" id="Hindi" value="Hindi" checked>
                        <label for="Hindi"><span class="iconr"></span> Hindi</label>
                        <input type="radio" name="language" id="Marathi" value="Marathi">
                        <label for="Marathi"><span class="iconr"></span> Marathi</label>
                        <input type="radio" name="language" id="English" value="English">
                        <label for="English"><span class="iconr"></span> English</label>
                    </div>
                </div>

                <div class="group radio2">
                    <label for="viewtype">View Type</label>

                    <div class="radiobtn">
                        <input type="radio" name="viewtype" id="twod" value="2D" checked>
                        <label for="twod"><span class="iconr"></span> 2D</label>
                        <input type="radio" name="viewtype" id="threed" value="3D">
                        <label for="threed"><span class="iconr"></span> 3D</label>
                    </div>
                </div>

                <div class="group">
                    <label for="mainfile2">Wide Poster</label>
                    <input type="file" name="mainfile2" id="mainfile2" accept="image/*">
                </div>

                <div class="group ta" style="width: 100%;">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Description..." required></textarea>
                </div>

                <div class="group ta">
                    <label for="director">Producer</label>
                    <textarea name="director" id="director" placeholder="Director" required></textarea>
                </div>

                <div class="group ta">
                    <label for="producer">Producer</label>
                    <textarea name="producer" id="producer" placeholder="Producer" required></textarea>
                </div>

                <div class="group ta">
                    <label for="cast">Cast</label>
                    <textarea name="cast" id="cast" placeholder="Cast" required></textarea>
                </div>

                <div class="group ta">
                    <label for="music">Music</label>
                    <textarea name="music" id="music" placeholder="Music" required></textarea>
                </div>

                <div class="group">
                    <input type="submit" name="submit" value="Submit">
                    <input type="hidden" name="allgenre" id="allgenre" value="">
                    <input type="hidden" name="str" id="str" value="addmovie">
                </div>

                <div class="closeform"><i class="icofont-ui-close"></i></div>
            </form>
        </div>

    </section>

    <!-- ======= Movie Form End ======= -->

    <!-- ======= Advanced Section ======= -->

    <section id="advanced" class="services">
        <div class="section-title">
            <h4>Advanced</h4>
        </div>
        <hr>
        <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'couponCode')">Coupon Code</button>
            <button class="tablinks" onclick="openTab(event, 'socialDistancing')">Social Distancing</button>
        </div>

        <div id="couponCode" class="tabs">
            <form action="" method="get" name="couponForm" class="couponForm" id="couponForm">
                <label for="code">Create a coupon code</label>
                <input type="text" name="code" id="code" value="" placeholder="Enter coupon code" required><br>
                <label for="discount">Discount</label>
                <input type="number" name="discount" id="discount" value="" placeholder="Discount" required>
                <label for="qty">Quantity</label>
                <input type="number" name="qty" min="1" id="qty" value="1" placeholder="Quantity" required>
                <input type="hidden" name="str" value="applycoupon">
                <input type="hidden" name="user" class="user" value="">
                <input type="submit" class="applyToAll" value="Apply to all"></input>
                <div class="giftImg">
                </div>
            </form>



            <table>

                <tr class="title">
                    <th>
                        <h4>USERS</h4>
                    </th>
                    <th>
                        <h4>TICKETS BOOKED</h4>
                    </th>
                    <th>
                        <h4>APPLY CODE</h4>
                    </th>
                </tr>
            </table>

            <div class="userTable">

                <table>

                    <?php
                    $content = getUsers();
                    echo $content;
                    ?>

                </table>
            </div>
        </div>

        <div id="socialDistancing" class="tabs"></div>

    </section>

    <script>
    function defaultTab(tabID) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabs");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        document.getElementById(tabID).style.display = "block";
    }

    function openTab(evt, tabID) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabs");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabID).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

    <!-- ======= Advanced Section End ======= -->




    <div id="preloader"></div>

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
    <script src="assets/js/admin.js"></script>

</body>

</html>

<?php

function getdashbox ($table) {
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from ".$table;
    $res=mysqli_query($con,$query);
    $count=mysqli_num_rows($res); 

    return $count;
}

function getline() {
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from socialdistance";
    $res=mysqli_query($con,$query);
    $d = "";
    
    if($data = mysqli_fetch_assoc($res)) {
        if(empty($data['state'])) {

        } else {
            $start = $data['date'];
            $expiry = $data['expiry'];
            $today = date("Y-m-d");

            if($data['state'] == "ON") {
                if($start < $today) {
                    $d = "Social Distancing Apllied From ". $start ." till ". $expiry .".";
                } else {
                    $d = "Social Distancing Aplying  From ". $start .".";
                }
            } else {
                $d = "";
            }
        }
    }

    return $d;
}

function getdashtable() {
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from movies order by expiry";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];
        $m=$data['moviename'];
        $r=$data['rating'];
        $ed=$data['expiry'];
        $ed=date('d M', strtotime($ed));

        $days = days_count($ed);
        $msg1 = '';
        $msg2 = '<i class="icofont-clock-time"></i>';
        
        if($days <= 0) {
            $msg2 = '<i class="far fa-calendar-times"></i>';
        }
        elseif($days <= 15) {
            $msg1 = 'class="about_to_end"';
            $msg2 = '<i class="icofont-sand-clock"></i>';
        }

        $d .= ' 
            <tr>    
                <td><img src="'.$p.'"></td>
                <td>
                    <h4>'.$m.'<h4>
                </td>
                <td id="likes">
                    <h4>'.$r.' <i class="icofont-heart-alt"></i></h4>
                </td>
                <td class="time">
                    <h4>'.$ed.'</h4> <div '.$msg1.'>'.$msg2.'</div>
                </td>
            </tr>
            ';
    }

    return $d;
}

function days_count($then) {
   
    $then = strtotime($then);

    $now = date("Y-m-d");
    $now = strtotime($now);

    $difference = $then - $now;

    $days = floor($difference / (60*60*24) );
    return $days;
}

function getmainslider() {
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from mainslider";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];
        
        $d .= ' 
        <div class="mainbox">
            <img src="assets/img/'.$p.'">

            <div class="option">
                <div class="edit"><i class="icofont-ui-edit"></i></div>
                <div class="delete"><i class="far fa-trash-alt"></i></div>
            </div>
        </div>
            ';
    }

    return $d;
}

function getmovies($type) {
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from movies where type = '$type'";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];
        $trailer=$data['trailer'];
        $n=$data['moviename'];
        $g=$data['genre'];
        $rd=$data['releasedate'];
        $rating=$data['rating'];
        $rd=date('d M Y', strtotime($rd));
        
        $d .= ' 
            <div class="moviebox">
                <div class="ps">
                    <img src="'.$p.'" />
                    <button><a href="'.$trailer.'" class="venobox" data-vbtype="video"
                            data-autoplay="true"><i class="icofont-ui-play"></i></a></button>
                </div>

                <div class="info">
                    <h4>'.$n.'</h4>
                    <p>'.$g.'</p>
                    <p>'.$rating.' <i class="icofont-heart-alt"></i></p>
                    <p>'.$rd.'</p>
                    <div class="btn">
                        <button class="deletemovie"><i class="far fa-trash-alt"></i></button>
                        <button class="editmovie"><i class="icofont-ui-edit"></i></button>
                    </div>
                </div>
            </div>
            ';
    }

    return $d;
}

function getmidslider() {
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from midslider";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];
        $trailer=$data['trailer'];
        $n=$data['moviename'];
        $g=$data['genre'];
        
        $d .= ' 
        <div class="mainbox">
            <img src="assets/img/'.$p.'">

            <div class="option">
                <div class="edit"><i class="icofont-ui-edit"></i></div>
                <div class="delete"><i class="far fa-trash-alt"></i></div>
            </div>

            <div class="editform">
                <form id="editform2" name="editform2" method="Post" action="admindata.php" enctype="multipart/form-data" autocomplete="off">
                    <div class="group">
                        <label for="moviename">Movie Name</label>
                        <input type="text" name="moviename" value="'.$n.'" required>
                    </div>
                    <div class="group">
                        <label for="image">Image</label>
                        <input type="file" accept="image/*" name="mainfile">
                    </div>
                    <div class="group">
                        <label for="trailer">Trailer</label>
                        <input type="url" name="trailer" value="'.$trailer.'" required>
                    </div>
                    <div class="group">
                        <label for="genre">Genre</label>
                        <input type="text" name="genre" value="'.$g.'" required>
                    </div>
                    <input type="hidden" name="str" value="editmidslide,'.$n.'">
                    <input type="submit" value="Apply Changes">

                    <div class="closeform"><i class="icofont-ui-close"></i></div>
                </form>
            </div>
        </div>
            ';
    }

    return $d;
}

function getUsers()
    {
        $con = mysqli_connect("localhost", "root", "", "myshows");
        $query = "select * from user order by ticket desc";
        $res = mysqli_query($con, $query);
        $d = '';

        while ($data = mysqli_fetch_array($res)) {
            $name = $data['username'];
            $ticket = $data['ticket'];


            $d .= ' 
            <tr>    
                <td><h4>' . $name . '<h4></td>
                <td><h4>' . $ticket . ' <i class="icofont-ticket"></i><h4></td>
                <td><button class="applyCoupon">Apply</button></td>
            </tr>
            ';
        }

        return $d;
    }

function countTickets() {
    $count = 0;
    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select ticket from user";
    $res = mysqli_query($con, $query);
    while ($data = mysqli_fetch_array($res)) {
        $count += ((int)$data['ticket']);
    }
    return $count;
}

?>