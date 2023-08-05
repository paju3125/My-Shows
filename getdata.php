<?php
error_reporting(0);

$str=$_POST['str'];

if($str=='lmovies')
{
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from movies where type='Latest'";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];
        $m=$data['moviename'];
        $g=$data['genre'];

        $d .= ' 
                <div class="item">
                    <div class="movie-box" data-aos="flip-right">
                        <img src="'.$p.'">
                        <h2>'.$m.'</h2>
                        <p>'.$g.'</p>
                    </div>
                </div> 
            ';
    }
    $d .= "
    <script>
    $('#latestmovies .item .movie-box').click(function () {
        sessionStorage.setItem('moviename', $(this).children('h2').html());
        window.location.href = 'information.html';
    });
    </script>
    ";

    echo $d;
}
elseif ($str=='popularmovies')
{
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from movies where type = 'Latest' order by rating desc limit 4";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];
        $m=$data['moviename'];
        $g=$data['genre'];

        $d .= ' 
            <div class="movie-box" data-aos="flip-right">
                <img src="'.$p.'">
                <h2>'.$m.'</h2>
                <p>'.$g.'</p>
            </div>
            ';
    }

    $d .= "
    <script>
    $('#popularmovies .movie-con .movie-box').click(function () {
        sessionStorage.setItem('moviename', $(this).children('h2').html());
        window.location.href = 'information.html';
    });
    </script>
    ";

    echo $d;
}
elseif ($str=='omovies')
{
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from movies where type='Old'";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];
        $m=$data['moviename'];
        $g=$data['genre'];

        $d .= ' 
            <div class="movie-box" data-aos="flip-right">
                <img src="'.$p.'">
                <h2>'.$m.'</h2>
                <p>'.$g.'</p>
            </div>
            ';
    }

    $d .= "
    <script>
    $('#oldmovies .movie-con .movie-box').click(function () {
        sessionStorage.setItem('moviename', $(this).children('h2').html());
        window.location.href = 'information.html';
    });
    </script>
    ";

    echo $d;
}
elseif($str=='mainslider')
{
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from mainslider";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $p=$data['image'];

        $d .= $p.',';
    }

    echo $d;
}
elseif($str=='midslider')
{
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from midslider";
    $res=mysqli_query($con,$query);
    $i=0;

    while($data=mysqli_fetch_array($res)) {
        $img=$data['image'];
        $m=$data['moviename'];
        $g=$data['genre'];
        $t=$data['trailer'];


        $arr[$i] = $age = array("image"=>$img, "movie"=>$m, "genre"=>$g, "trailer"=>$t);
        $i=$i+1;
    }

    echo json_encode($arr);
}
elseif($str=='moviedetails')
{   
    $name = $_POST['name'];
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from movies where moviename ='".$name."'";
    $res=mysqli_query($con,$query);
    $d='';


    while($data=mysqli_fetch_array($res)) {
        $img = $data['image'];
        $m = $data['moviename'];
        $g = $data['genre'];
        $t = $data['trailer'];
        $w = $data['wideposter'];
        $rd = $data['releasedate'];
        $rd=date('d M Y', strtotime($rd));
        $rt = $data['rating'];
        $vt = $data['viewtype'];
    }

    $query = "select * from moviedetails where moviename ='".$name."'";
    $res=mysqli_query($con,$query);


    while($data=mysqli_fetch_array($res)) {
        $l = $data['language'];
        $cast = $data['cast'];
        $dir = $data['director'];
        $pro = $data['producer'];
        $mus = $data['music'];
        $des = $data['description'];
    }

    if(!empty($w)) {
        $msg = "background-image: linear-gradient(90deg, rgb(34, 34, 34) 24.97%, rgb(34, 34, 34) 38.3%, rgba(34, 34, 34, 0.04) 97.47%, rgb(34, 34, 34) 100%), url(".$w.");";
    } else {
       $msg = "background: #000000;
       background: -webkit-linear-gradient(to right, #434343, #000000);
       background: linear-gradient(to right, #434343, #000000);";
    }

    $d .= '
        <div class="upperinfo">
            <div class="outer-con" style="'.$msg.'background-size: 100% 100%;background-repeat: no-repeat;background-position: right center;">
                <div class="inner-con">
                    <div class="poster">
                        <img src="'.$img.'" alt="poster">
                        <button><a style="color: #dd0e61;" href="'.$t.'" class="venobox" data-vbtype="video"
                            data-autoplay="true"><i class="icofont-ui-play"></i></a></button>
                    </div>

                    <div class="details">
                        <h4>'.$m.'</h4>
                        <div class="ratings"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-1 -1 22 22"
                                id="icon-heart">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.195 10.376a4.617 4.617 0 00-6.535-6.524l-.66.66-.66-.66a4.617 4.617 0 00-6.533 6.526l6.742 7.032a.625.625 0 00.902 0l6.744-7.034z"
                                    fill="#EB4E62"></path>
                            </svg> '.$rt.'%</div>
                        
                        <div class="rate-box">
                            <div class="text">
                                <h3>Rating</h3>
                                <p>How was the movie</p>
                            </div>
                            <button>Rate Now</button>
                        </div>

                        <div class="lan-view">
                            <p>'.$vt.'</p>
                            <p>'.$l.'</p>
                        </div>
    
                        <div class="other">
                            <p>'.$g.'</p>
                            <p>'.$rd.'</p>
                        </div>

                        <div class="book-btn">
                            <button>Book Ticket</button>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="lowerinfo">
            <div class="main-info">
                <h4>Description</h4>
                <p>'.$des.'</p>
            </div>

            <div class="info">
                <div class="sec">
                    <h4>Cast</h4>
                    <p>'.$cast.'</p>
                </div>

                <div class="sec">
                    <h4>Director</h4>
                    <p>'.$dir.'</p>
                </div>
            </div>

            <div class="info">
                <div class="sec">
                    <h4>Producer</h4>
                    <p>'.$pro.'</p>
                </div>

                <div class="sec">
                    <h4>Music</h4>
                    <p>'.$mus.'</p>
                </div>
            </div>
        </div>

        <script>
        $(document).on("click", ".rate-box button, .close-ratebox", function(e) {
            var user = "";
            var name = "username=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    user = c.substring(name.length, c.length);
                }
            }

            if (user == "") {
                const t1 = gsap.timeline({
                    defaults: {
                        ease: "power2.out"
                    }
                });
    
                t1.to(".loginbg", {
                    x: "0%",
                    duration: 0
                });
                t1.fromTo(".loginbg", {
                    y: "-100%",
                    opacity: "0"
                }, {
                    y: "0%",
                    opacity: "1",
                    duration: 1
                });
                t1.fromTo(".login-box", {
                    y: "50%",
                    opacity: "0",
                    scale: "0",
                }, {
                    y: "0%",
                    opacity: "1",
                    scale: "1",
                    duration: 0.8
                });
                return;
            }

            $("section.ratebox-bg").toggleClass("active");
        });

        $(".book-btn button").click(function () {
            var user = "";
            var name = "username=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    user = c.substring(name.length, c.length);
                }
            }

            if(user == "") {
                const t1 = gsap.timeline({
                    defaults: {
                        ease: "power2.out"
                    }
                });
    
                t1.to(".loginbg", {
                    x: "0%",
                    duration: 0
                });
                t1.fromTo(".loginbg", {
                    y: "-100%",
                    opacity: "0"
                }, {
                    y: "0%",
                    opacity: "1",
                    duration: 1
                });
                t1.fromTo(".login-box", {
                    y: "50%",
                    opacity: "0",
                    scale: "0",
                }, {
                    y: "0%",
                    opacity: "1",
                    scale: "1",
                    duration: 0.8
                });
                return;
            }

            window.location.href = "form.html";
        });
        </script>
    ';

    echo $d;
}
elseif($str == "submitrating") {
    $name = $_POST['movie'];
    $rating = $_POST['rating'];
    $user = $_POST['user'];

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select sum(ratings) from rating where movie = '".$name."'";
    $res=mysqli_query($con,$query);
    $arr = mysqli_fetch_array($res);
    
    if(mysqli_num_rows($res) > 0) {
        $sum = $arr['sum(ratings)'];
    } else {
        $sum = 0;
    }

    $query = "select count(ratings) from rating where movie = '".$name."'";
    $res=mysqli_query($con,$query);
    $arr = mysqli_fetch_array($res);

    $cnt = $arr['count(ratings)'];

    $avg = ($sum + $rating) / ($cnt + 1);
    $avg = round($avg);

    $query = "select email from user where username = '".$user."' limit 1";
    $res=mysqli_query($con,$query);
    $arr = mysqli_fetch_array($res);
    $email = $arr['email'];

    $query = "insert into rating value('$email', '$name', '$rating')";
    $res=mysqli_query($con,$query);

    $query = "update movies set rating = '$avg' where moviename = '$name'";
    $res=mysqli_query($con,$query);

    // echo "<script>alert('".$sum."  ".$cnt."  ".$avg."');</script>";
    $d='
                        <div class="text">
                                <h3>Your Rating</h3>
                                <p>How was the movie</p>
                            </div>
                            <div class="userrt">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-1 -1 22 22"
                            id="icon-heart">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.195 10.376a4.617 4.617 0 00-6.535-6.524l-.66.66-.66-.66a4.617 4.617 0 00-6.533 6.526l6.742 7.032a.625.625 0 00.902 0l6.744-7.034z"
                                fill="#EB4E62"></path>
                        </svg> '.$rating.'</div> | '.$avg.'
                        ';

    echo $d;
}
elseif($str == "getrating") {
    $movie = $_POST['name'];
    $user = $_POST['user'];

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select email from user where username = '".$user."' limit 1";
    $res=mysqli_query($con,$query);
    $arr = mysqli_fetch_array($res);
    $email = $arr['email'];

    $query = "select ratings from rating where email = '$email' and movie = '$movie' limit 1";
    $res=mysqli_query($con,$query);
    $data = mysqli_fetch_array($res);

    $rating = $data['ratings'];
    // echo "<script>alert('".$rating."');</script>";

    if(!empty($rating)) {
        $d='
        <div class="text">
        <h3>Your Rating</h3>
        <p>How was the movie</p>
        </div>
        <div class="userrt">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-1 -1 22 22"
        id="icon-heart">
        <path fill-rule="evenodd" clip-rule="evenodd"
        d="M17.195 10.376a4.617 4.617 0 00-6.535-6.524l-.66.66-.66-.66a4.617 4.617 0 00-6.533 6.526l6.742 7.032a.625.625 0 00.902 0l6.744-7.034z"
        fill="#EB4E62"></path>
        </svg> '.$rating.'</div>
        ';
    } else {  
        $d='
        <div class="text">
        <h3>Rating</h3>
        <p>How was the movie</p>
        </div>
        <button>Rate Now</button>              
        ';
    }

    echo $d;

}
elseif($str == 'searchlist') {
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select moviename from movies order by moviename";
    $res=mysqli_query($con,$query);
    $d='';

    while($data=mysqli_fetch_assoc($res)) {
        $d .= "<li>".$data['moviename']."</li>";
    }

    $d .= '
    <script>
    $(document).ready(function () { 
        $(".searchbar .search-list li").click(function () {
            console.log("hi");
            sessionStorage.setItem("moviename", $(this).html());
            window.location.href = "information.html";
        });
    });
    </script>
    ';

    echo $d;
}
elseif($str == 'getdataforform') {
    $name = $_POST['name'];

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from movies where moviename = '$name' limit 1";
    $res=mysqli_query($con,$query);
    $d='';
    $time = '';

    if($data=mysqli_fetch_assoc($res)) {
        $img = $data['image'];
        $wp = $data['wideposter'];
        $exp = $data['expiry'];
        $sc = array();

        if(!empty($data['screen1'])) {
            $t1=explode(",", $data['screen1']);
            foreach($t1 as $i) {
            array_push($sc, "Screen 1 - ".$i);
            }
        }
        
        if(!empty($data['screen2'])) {
            $t2=explode(",", $data['screen2']);
            foreach($t2 as $i) {
                array_push($sc, "Screen 1 - ".$i);
            }
        }
        if(!empty($data['screen3'])) {
            $t3=explode(",", $data['screen3']);
            foreach($t3 as $i) {
                array_push($sc, "Screen 3 - ".$i);
            }
        }

        foreach ($sc as $i) {
            $time .= '<option value="'.$i.'">'.$i.'</option>';
        }

        $d .= '
        <div class="book-form-back" style="background: url('.$wp.') no-repeat; background-size: 100% 100%;">
            <form name="book-form" id="book-form" method="POST" autocomplete="off">
                <div class="container register">
                    <div class="row">
                        <div class="col-lg-3 register-left">
                            <img src="'.$img.'" alt="poster" id="poster" />
                        </div>

                        <div class="col-lg-9 register-right">
                            <h2 class="register-heading" id="title"><b>'.$name.'</b></h2>

                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="book-date" class="form-control" id="book-date" max="'.$exp.'" onchnage="resettime()" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="number" name="book-seats" id="book-seat" class="form-control"
                                            placeholder="No of Seats" min="1" max="15" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" id="book-time" name="book-time" required>
                                            <option value="" selected disabled>Select Time</option>
                                            '.$time.'
                                        </select>
                                    </div>

                                    <input type="submit" class="btnRegister" value="Book Seats" />
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        ';
    }

    $d .= '
    <script>
            checkstate();

            var loc = "";
            var name = "location=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    loc = c.substring(name.length, c.length);
                }
            }

        var today = new Date();
        
        var time=(today.getHours()).toString();
        if(time>=22)
        {
        today.setDate(today.getDate()+1);
        }

        var dd = String(today.getDate()).padStart(2, "0");
        var mm = String(today.getMonth()+1).padStart(2, "0");
        var yyyy = today.getFullYear();
        var t = yyyy+"-"+mm+"-"+dd;

        var d2 = new Date("'.$exp.'");   
                
        var diff = d2.getTime() - today.getTime();   
        var daydiff = diff / (1000 * 60 * 60 * 24);   
                
        $("#book-form #book-date").attr("min", t);
        $("#book-form #book-date").val(t);


        if(Math.round(daydiff) > 2) {
            today.setDate(today.getDate() + 2);
            var dd = String(today.getDate()).padStart(2, "0");
            var mm = String(today.getMonth()+1).padStart(2, "0");
            var yyyy = today.getFullYear();
            var t1 = yyyy+"-"+mm+"-"+dd;
            $("#book-form #book-date").attr("max", t1);
        } else {
            $("#book-form #book-date").attr("max", '.$exp.');
        }
        
        $("#book-form #book-date").on("change",function() {
            checkstate();

            if($("#book-form #book-date").val() === t) {
                $("#book-form #book-time").val("");
            }
            $("#book-form #book-seat").val("");
        });

        $("#book-form #book-time").on("change",function() {
            $("#book-form #book-seat").val("");
        });

        $("#book-form #book-time").on("focus",function() {
            if($("#book-form #book-date").val() === t) {
        
                $("#book-form #book-time option").each(function() {
                    var tm = $(this).val().substr(11,2);
                    var mn = $(this).val().substr(17,2);
                    if(mn == "PM" && tm != 12) {
                        tm = parseInt(tm) + 12;
                    }
                    
                    // console.log(tm);
                    if(tm <= time) {
                        $(this).attr("disabled", "disabled");
                    } else {
                        $(this).removeAttr("disabled");
                    }
                });
            } else {
                $("#book-form #book-time option").removeAttr("disabled");
                $("#book-form #book-time option").first().attr("disabled", "disabled");
            }
        });

        var active ="";

        $("#book-form").on("submit",function(event) {
            event.preventDefault();

            $(".services3").hide();

            if(loc == "My Cinema" || loc == "Chitra Multiplex") {
                $("#layout2").show();
                active ="#layout2";
            }
            if(loc == "Asha Multiplex" || loc == "Shivam Plasa") {
                $("#layout1").show();
                active ="#layout1";
            }
            if(loc == "Madhyan Multiplex" || loc == "The Annexe") {
                $("#layout3").show();
                active ="#layout3";
            }
        });

        $("#book-form #book-seat").on("change", function() {
            let movie = sessionStorage.getItem("moviename");

            if(loc == "My Cinema" || loc == "Chitra Multiplex") {
                
                active ="#layout2";
            }
            if(loc == "Asha Multiplex" || loc == "Shivam Plasa") {
             
                active ="#layout1";
            }
            if(loc == "Madhyan Multiplex" || loc == "The Annexe") {
               
                active ="#layout3";
            }

            $.ajax({
                url: "getdata.php",
                type: "post",
                data: {
                    str: "getavailableseats",
                    location: loc,
                    name: movie,
                    time: $("#book-form #book-time").val(),
                    date: $("#book-form #book-date").val()
                },
                success: function (data) {
                    var seats = data.split(",");
                    
                    if($(active + " .seats:not(:disabled)").length - seats.length < 15) {
                        $("#book-form #book-seat").attr("max", $(active + " .seats").length - seats.length);
                    } else {
                        $("#book-form #book-seat").attr("max", 15);
                    }

                    $(active + " .seats").each(function () {
                        seats.forEach(i => {
                            if ($(this).val() == i) {
                                $(this).removeClass("notreserved");
                                $(this).addClass("reserved");
                            }
                        });
                    });
                }
            });
        });

        
        function checkstate(){
            $.ajax({
                url: "getdata.php",
                type: "post",
                data: {
                    str: "checksocialdate"
                },
                success: function (data) {
                    if(data!="")
                    {  
                        if($("#book-form #book-date").val() >= data)
                        {
                            socialdistance(); 
                        }
                    }
                }
            });
        }

        

        function socialdistance() {
            var active = "";

            if(loc == "My Cinema" || loc == "Chitra Multiplex") {
                active = "#layout2"
            }
            if(loc == "Asha Multiplex" || loc == "Shivam Plasa") {
                active = "#layout1"
            }
            if(loc == "Madhyan Multiplex" || loc == "The Annexe") {
                active = "#layout3"
            }
            
            if(active == "#layout1")
            {
                var covid=document.getElementById("layout1").querySelectorAll("input[type=checkbox]");
                for(i=1;i<=120;i+=2)
                {
                    $(covid[i]).attr("disabled", "disabled");
                }
            }
            else if(active == "#layout2")
            {
                
                var covid=document.getElementById("layout2").querySelectorAll("input[type=checkbox]");  
                for(i=1;i<=132;i+=2)
                {
                    $(covid[i]).attr("disabled", "disabled");
                }
            }
            else
            {
                var covid=document.getElementById("layout3").querySelectorAll("input[type=checkbox]"); 
                for(i=1;i<=109;i+=2)
                {
                    $(covid[i]).attr("disabled", "disabled");
                }
            }
        }

    </script>
    '; 

    echo $d;
}
elseif($str == "getavailableseats") {
    $movie = $_POST['name'];
    $loc =  str_replace(' ', '', strtolower($_POST['location']));  
    $date = $_POST['date'];
    $time = explode(' - ', $_POST['time']);

    
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select seats from ".$loc." where movie = '".$movie."' and bookdate = '".$date."' and time = '".$time[1]."' and screen = '".$time[0]."'";
    $res=mysqli_query($con,$query);
    $d='';
    
    // echo $query;

    if($data=mysqli_fetch_assoc($res)) {
        if(empty($data['seats'])) {
            $d = "0";
        } else {
            $d = $data['seats'];
        }
    }

    echo $d;
}
// Update Seats after Payment
elseif($str == "updateSeats") {
    $movie = $_POST['name'];
    $time = $_POST['time'];
    $screen = $_POST['screen'];
    $date = $_POST['date'];
    $seats = $_POST['seats'];
    $loc =  str_replace(' ', '', strtolower($_COOKIE['location']));

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from ".$loc." where movie = '$movie' and screen = '$screen' and bookdate = '$date' and time = '$time'";
    $res=mysqli_query($con,$query);

    if(mysqli_num_rows($res) > 0) {
        if($data = mysqli_fetch_assoc($res)) {
            $query = "update ".$loc." set seats = '".$data['seats'].",".$seats."' where movie = '$movie' and screen = '$screen' and bookdate = '$date' and time = '$time'"; 
            $res=mysqli_query($con,$query);
        }
    } else {
        $query = "insert into ".$loc." values('$movie', '$screen', '$date', '$time', '$seats')";
        $res=mysqli_query($con,$query);    
    }

    // Update number of tickets of user
    $user = $_COOKIE['username'];
    $ticket = count(explode(',', $seats));
    $query = "select ticket from user where username = '$user'";
    $res = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($res);
    $ticket = ((int)$data['ticket']) + $ticket;
    $query = "update user set ticket = '$ticket' where username = '$user'";
    $res = mysqli_query($con, $query);
}
// Get All Coupon Codes for Index page
elseif ($str == 'getallcoupons') {
    $user = $_COOKIE['username'];

    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select coupon from user where username= '$user'";
    $res = mysqli_query($con, $query);
    $d = '';

    if ($data = mysqli_fetch_assoc($res)) {
        if (!empty($data['coupon'])) {
            $codes = explode(',', $data['coupon']);

            foreach ($codes as $value) {
                $c = explode('-', $value);
                
                $d .= " <li>
                        <h3>".$c[0]."</h3>
                        <h3>".$c[1]."</h3>
                        <h3>".$c[2]."</h3>
                        </li>";
            }
        } 
    }

    echo $d;
}
// Check State of Socail Distancing
elseif ($str == 'getsocialstate') {
    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select state from socialdistance limit 1";
    $res = mysqli_query($con, $query);

    if ($data = mysqli_fetch_assoc($res)) {
        if (empty($data['state'])) {
            $d = "OFF";
        } else {
            $d = $data['state'];
        }
    } 

    echo $d;
}
// Check Coupon after Applying
elseif ($str == 'getcouponcode') {
    $name = $_COOKIE['username'];
    $code = $_POST['code'];
    $total = $_POST['price'];

    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select coupon from user where username= '$name'";
    $res = mysqli_query($con, $query);
    $d = '';

    $code = strtoupper($code);

    if ($data = mysqli_fetch_assoc($res)) {
        if (!empty($data['coupon'])) {
            $codes = explode(',', $data['coupon']);

            foreach ($codes as $value) {
                $c = explode('-', $value);
                
                if ($code == $c[0]) {
                    $total = $total - ($total * $c[1] / 100);
                    $d = $total;
                    break;
                } else {
                    $d = "Invalid Coupon Code";
                }
            }
        }
    }

    echo $d;
}
// Update Coupon after Payment
elseif ($str == "updateCoupon") {
    $code = $_POST['code'];
    $code = strtoupper($code);
    $user = $_COOKIE['username'];

    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select coupon from user where username= '$user'";
    $res = mysqli_query($con, $query);
    $d = '';

    if ($data = mysqli_fetch_assoc($res)) {
        if (empty($data['coupon'])) {
            // echo "You have no Coupon codes";
        } else {
            $coupons = explode(',', $data['coupon']);
            
            foreach ($coupons as $key => $coupon) {
                $c = explode('-', $coupon);
                if ($code == $c[0]) {
                    if ((int)$c[2] > 1) {
                        $qty = (int)$c[2];
                        $qty -= 1;
                        $c[2] = "" . $qty;
            
                        $coupons[$key] = $c[0] . '-' . $c[1] . '-' . $c[2];
                    } else {
                        $coupons[$key] = "";
                    }
                } 
            }

            foreach ($coupons as $key => $coupon) {
                if ($coupon == '') {
                    echo $coupon;
                    unset($coupons[$key]);
                }
            }

            $query = "update user set coupon = '" . implode(',', $coupons) . "' where username= '$user'";
            $res = mysqli_query($con, $query);
        }
    }
}
elseif($str == "checksocialdate") {
 
    
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from socialdistance";
    $res=mysqli_query($con,$query);
    $d='';
    
    // echo $query;

    if($data=mysqli_fetch_assoc($res)) {
        if($data['state']=="ON") 
        {
            echo $data['date'];
        }
    }
}
else 
{
    die('Error 404...!');
}
