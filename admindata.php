<?php
error_reporting(0);

$str=explode(",", $_POST['str']);

if($str[0] == 'deleteslide') {
    $img = $_POST['img'];
    
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "delete from mainslider where image = '$img'";
    mysqli_query($con,$query);

    echo 'Slide is deleted successfully';
}
elseif($str[0] == 'deletemidslide') {
    $img = $_POST['img'];
    
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "delete from midslider where image = '$img'";
    mysqli_query($con,$query);

    echo 'Slide is deleted successfully';
}
elseif($str[0] == 'deletemovie') {
    $name = $_POST['name'];
    
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "delete from movies where moviename = '$name'";
    mysqli_query($con,$query);
    
    $query = "delete from moviedetails where moviename = '$name'";
    mysqli_query($con,$query);

    echo 'Movie is deleted successfully';
}
elseif($str[0] == 'editslide') {
    $nimg = $_FILES['mainfile']['name'];
    $oimg = $str[1];

    if(uploadfile()) {

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "update mainslider set image ='$nimg' where image = '$oimg'";
    mysqli_query($con,$query);

    echo '<script>alert("Slide is updated successfully"); window.location.href="admin.php#mainslider";</script>';
    }
}
elseif($str[0] == 'editmidslide') 
    {
        $n=$_POST['moviename'];
        $i=$_FILES['mainfile']['name'];
        $t=$_POST['trailer'];
        $g=$_POST['genre'];

        if(!empty($i))
        {
            if(uploadfile()) {
                $con=mysqli_connect("localhost","root","","myshows");
                $query = "update midslider set image ='$i', moviename='$n',trailer='$t',genre='$g' where moviename = '".$str[1]."'";
                mysqli_query($con,$query);  
                header("Location: admin.php#midslider");
            }
            else{ echo "<script>alert('Sorry, your Image was not uploaded');window.location.href='admin.php#midslider';</script>";}
        }
        else{
            $con=mysqli_connect("localhost","root","","myshows");
            $query = "update midslider set moviename='$n',trailer='$t',genre='$g' where moviename = '".$str[1]."'";
            mysqli_query($con,$query);  
            header("Location: admin.php#midslider");
        }
    }
// Edit-Movie form
elseif ($str[0] == 'updatemovie') {
    $name = $_POST['name'];
    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select * from movies where moviename = '$name'";
    $res = mysqli_query($con, $query);
    $d = '';

    while ($data = mysqli_fetch_array($res)) {
        $p = $data['image'];
        $trailer = $data['trailer'];
        $n = $data['moviename'];
        $g = $data['genre'];
        $rd = $data['releasedate'];
        $ed = $data['expiry'];
        $rating = $data['rating'];
        $t = $data['type'];
        $vt = $data['viewtype'];
        $time = $data['time'];
        $price = $data['price'];
    }

    $c = mysqli_connect("localhost", "root", "", "myshows");
    $q = "select * from moviedetails where moviename = '$name'";
    $r = mysqli_query($c, $q);

    while ($d = mysqli_fetch_array($r)) {
        $language = $d['language'];
        $cast = $d['cast'];
        $music = $d['music'];
        $producer = $d['producer'];
        $director = $d['director'];
        $desc = $d['description'];
    }

    $d .= ' 
            
            <div class="section-title">
                <h4>Update Movie Form</h4>
            </div>
            <hr>
            <div class="moviecon">
                <form class="movieform" name="updatemovie" method="POST" action="admindata.php" enctype="multipart/form-data"
                autocomplete="on">
                    
                    <div class="group">
                        <label for="moviename">Movie Name</label>
                        <input type="text" name="moviename" value="' . $n . '" placeholder="Movie Name" autofocus required>
                    </div>
    
                    <div class="group">
                        <label for="mainfile">Poster</label>
                        <input type="file" name="mainfile" accept="image/*">
                    </div>
    
                    <div class="group">
                        <label for="trailer">Trailer</label>
                        <input type="url" name="trailer" value="' . $trailer . '" placeholder="Trailer Url" required>
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
                        <input type="date" name="release" value="' . $rd . '" required>
                    </div>
    
                    <div class="group">
                    <label for="expiry">Last Date</label>
                    <input type="date" name="expiry" value="' . $ed . '" required>
                    </div>
                    
                    <div class="group">
                        <label for="price">Price</label>
                        <input type="number" name="price" placeholder="Price" min="80" max="300" value="' . $price . '" required>
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
                            <input type="radio" name="viewtype" id="twod" value="2D">
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
                    <textarea name="description" id="description" placeholder="Description..." required>'.$desc.'</textarea>
                </div>
                    
                    <div class="group ta">
                        <label for="director">Director</label>
                        <textarea name="director" placeholder="Director" required>' . $director . '</textarea>
                    </div>
    
                    <div class="group ta">
                        <label for="producer">Producer</label>
                        <textarea name="producer" placeholder="Producer" required>' . $producer . '</textarea>
                    </div>
    
                    <div class="group ta">
                        <label for="cast">Cast</label>
                        <textarea name="cast" placeholder="Cast"  required>' . $cast . '</textarea>
                    </div>
    
                    <div class="group ta">
                        <label for="music">Music</label>
                        <textarea name="music" placeholder="Music"  required>' . $music . '</textarea>
                    </div>
    
                    <div class="group">
                        <input type="submit" value="Submit">
                        <input type="hidden" name="allgenre" id="allgenre" value="'.$g.'"> 
                        <input type="hidden" name="str" value="movieUpdate,'.$t.','.$name.'"> 
                    </div>

                    <div class="closeform"><i class="icofont-ui-close"></i></div>
    
                    <script>
                        $(".movieform .closeform").click(function () {
                            window.location.reload();
                        });
                    
                        $("input[type=radio][name=viewtype]").each(function () {
                            if($(this).val()=="' . $vt . '") {
                                $(this).attr("checked","true");
                            }
                        });

                        $("input[type=radio][name=language]").each(function () {
                            if($(this).val()=="' . $language . '") {
                                $(this).attr("checked","true");
                            }
                        });

                        let g = document.getElementById("getGenre").value;
                        let genre = g.split(" | ");
                        console.log(genre);                        
                        for(i=0;i<genre.length;i++){
                            $("input[type=checkbox][name=genre]").each(function () {
                                if($(this).val()== genre[i]) {
                                    $(this).attr("checked","true");
                                }
                                if ($("#editmovieform .movieform input[type=checkbox][name=genre]:checked").length == 4) {
                                    $("#editmovieform .movieform input[type=checkbox][name=genre]:not(:checked)").prop("disabled", true);
                                } else {
                                    $("#editmovieform .movieform input[type=checkbox][name=genre]:not(:checked)").prop("disabled", false);
                                }
                            });
                        }

                        $("#editmovieform .movieform input[type=checkbox][name=genre]").click(function () {
                            if ($("#editmovieform .movieform input[type=checkbox][name=genre]:checked").length == 4) {
                                $("#editmovieform .movieform input[type=checkbox][name=genre]:not(:checked)").prop("disabled", true);
                            } else {
                                $("#editmovieform .movieform input[type=checkbox][name=genre]:not(:checked)").prop("disabled", false);
                            }
                        });

                    </script>
            
                </form>
            </div>
    
    
                ';

    echo $d;
}
// For Updating Values in Database

elseif ($str[0] == 'movieUpdate') 
{
    $n = $_POST['moviename'];
    $i = $_FILES['mainfile']['name'];
    $wp = $_FILES['mainfile2']['name'];
    $t = $_POST['trailer'];
    $g = $_POST['allgenre'];
    $r = $_POST['release'];
    $e = $_POST['expiry'];
    $l = $_POST['language'];
    $vt = $_POST['viewtype'];
    $p = $_POST['price'];
    $di = $_POST['director'];
    $de = $_POST['description'];
    $pr = $_POST['producer'];
    $c = $_POST['cast'];
    $m = $_POST['music'];

    foreach($_POST['time1'] as $v){ 
        $sc1=$v.','.$sc1; 
    }
    foreach($_POST['time2'] as $v){ 
        $sc2=$v.','.$sc2; 
    }
    foreach($_POST['time3'] as $v){ 
        $sc3=$v.','.$sc3; 
    }
    $sc1 = substr($sc1, 0, -1);
    $sc2 = substr($sc2, 0, -1);
    $sc3 = substr($sc3, 0, -1);
 
    // echo "<script>alert('".$de."'); </script>";

    if(!empty($i)){
       
        if (uploadfile()) {
            $i = "assets/img/" . $i;
            $con = mysqli_connect("localhost", "root", "", "myshows");
            $query = "update movies set image = '$i' where moviename='" . $str[1] . "'";
            mysqli_query($con, $query);
        }
        else 
        {echo "<script>alert('Sorry, your Image was not uploaded');window.location.href='admin.php#latestmovies';</script>";}
        
           
    }
    if(!empty($wp)){

        if (uploadfile2()) {
            $wp = "assets/img/" . $wp;
            $con = mysqli_connect("localhost", "root", "", "myshows");
            $query = "update movies set wideposter='$wp' where moviename='" . $str[1] . "'";
            mysqli_query($con, $query);
        }
        else {echo "<script>alert('Sorry, your Image was not uploaded');window.location.href='admin.php#latestmovies';</script>";}
    }

    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "update moviedetails set moviename = '$n',language = '$l',releasedate = '$r',cast = '$c', music = '$m', producer = '$pr',director = '$di',description = '$de' where moviename='" . $str[1] . "'";
    mysqli_query($con, $query);

    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "update movies set moviename = '$n',genre = '$g',trailer = '$t',price = '$p'
    ,screen1 = '$sc1',screen2 = '$sc2',screen3 = '$sc3', type = '".$str[2]."',expiry='$e', releasedate ='$r',viewtype = '$vt' where moviename='" . $str[1] . "'";
    mysqli_query($con, $query);
    echo '<script>alert("Movie is Updated Successfully."); window.location.href="admin.php#latestmovies";</script>';
}
elseif($str[0] == 'addslide') {
    $img = $_FILES['mainfile']['name'];

    if(uploadfile()) {

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "insert into mainslider value('$img')";
    mysqli_query($con,$query);

    echo '<script>alert("Slide is added successfully"); window.location.href="admin.php#mainslider";</script>';
    }
}
elseif($str[0] == 'addmidslide') {
    $n=$_POST['moviename'];
    $img=$_FILES['mainfile']['name'];
    $trailer=$_POST['trailer'];
    $g=$_POST['genre'];

    if(uploadfile()) {

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "insert into midslider value('$img', '$n', '$g', '$trailer')";
    mysqli_query($con,$query);

    echo '<script>alert("Slide is added successfully"); window.location.href="admin.php#midslider";</script>';
    }
}
elseif($str[0] == 'addmovie') 
    {
        $n=$_POST['moviename'];
        $i=$_FILES['mainfile']['name'];
        $t=$_POST['trailer'];
        $g=$_POST['allgenre'];
        $r=$_POST['release'];
        $e=$_POST['expiry'];
        $l=$_POST['language'];
        $vt=$_POST['viewtype'];
        $p=$_POST['price'];
        $di=$_POST['director'];
        $de=$_POST['description'];
        $pr=$_POST['producer'];
        $c=$_POST['cast'];
        $m=$_POST['music']; 
        $ra="0";  
        $w=$_FILES['mainfile2']['name'];

        foreach($_POST['time1'] as $v){ 
            $sc1=$v.','.$sc1; 
        }
        foreach($_POST['time2'] as $v){ 
            $sc2=$v.','.$sc2; 
        }
        foreach($_POST['time3'] as $v){ 
            $sc3=$v.','.$sc3; 
        }
        $sc1 = substr($sc1, 0, -1);
        $sc2 = substr($sc2, 0, -1);
        $sc3 = substr($sc3, 0, -1);

        if(!empty($w))
        {
            if(uploadfile2())
            { 
                if(uploadfile()) {
                    $i="assets/img/".$i;
                    $w="assets/img/".$w;
                    $con=mysqli_connect("localhost","root","","myshows");
                    $query = "insert into movies value('$n','$i','$g','$t','$p','$sc1','$sc2','$sc3','$w','".$str[1]."','$r','$e','$ra','$vt')";
                    mysqli_query($con,$query);
            
                    $query = "insert into moviedetails value('$n','$l','$r','$c','$m','$pr','$di','$de')";
                    mysqli_query($con,$query); 
                    echo '<script>alert("Movie is Added Successfully."); window.location.href="admin.php#latestmovies";</script>';
                    }
                    else{ echo "<script>alert('Sorry, your Image was not uploaded');window.location.href='admin.php#latestmovies';</script>";}
            }
            else{ echo "<script>alert('Sorry, your Wide Image was not uploaded');window.location.href='admin.php#latestmovies';</script>";}
        }   
        else{
           $w="";
            if(uploadfile()) {
                $i="assets/img/".$i; 
                $con=mysqli_connect("localhost","root","","myshows");
                $query = "insert into movies value('$n','$i','$g','$t','$p','$sc1','$sc2','$sc3','$w','".$str[1]."','$r','$e','$ra','$vt')";
                mysqli_query($con,$query);
        
                $query = "insert into moviedetails value('$n','$l','$r','$c','$m','$pr','$di','$de')";
                mysqli_query($con,$query); 
                echo '<script>alert("Movie is Added Successfully."); window.location.href="admin.php#latestmovies";</script>';
                }
                else{ echo "<script>alert('Sorry, your Image was not uploaded');window.location.href='admin.php#latestmovies';</script>";}
         }
         
    }
elseif($str[0] == 'edittimeslots') {
    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select * from movies";
    $res = mysqli_query($con, $query);
    $sc1=array();
    $sc2=array();
    $sc3=array();

    while ($data = mysqli_fetch_array($res)) {
        if($data['moviename'] == $str[1]) {
            if(!empty($data['screen1'])) {
                $t1=explode(",", $data['screen1']);
                foreach($t1 as $i) {
                array_push($sc1, "$".$i);
                }
            }
            
            if(!empty($data['screen2'])) {
                $t2=explode(",", $data['screen2']);
                foreach($t2 as $i) {
                    array_push($sc2, "$".$i);
                }
            }
            if(!empty($data['screen3'])) {
                $t3=explode(",", $data['screen3']);
                foreach($t3 as $i) {
                    array_push($sc3, "$".$i);
                }
            }
        }
        else {
            if(!empty($data['screen1'])) {
                array_push($sc1, $data['screen1']);
            }

            if(!empty($data['screen2'])) {
                array_push($sc2, $data['screen2']);
            }
            if(!empty($data['screen3'])) {
                array_push($sc3, $data['screen3']);
            }
        }
    }
    
    $time=array();
    array_push($time, $sc1);
    array_push($time, "#");
    array_push($time, $sc2);
    array_push($time, "#");
    array_push($time, $sc3);

    echo json_encode($time);
}
elseif($str[0] == 'gettimeslots') {
    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "select * from movies";
    $res = mysqli_query($con, $query);
    $sc1=array();
    $sc2=array();
    $sc3=array();

    while ($data = mysqli_fetch_array($res)) {
        if(!empty($data['screen1'])) {
            array_push($sc1, $data['screen1']);
        }

        if(!empty($data['screen2'])) {
            array_push($sc2, $data['screen2']);
        }
        if(!empty($data['screen3'])) {
            array_push($sc3, $data['screen3']);
        }
    }
    
    $time=array();
    array_push($time, $sc1);
    array_push($time, "#");
    array_push($time, $sc2);
    array_push($time, "#");
    array_push($time, $sc3);

    echo json_encode($time);
}
elseif($str[0] == 'socialdistanceform') {
    $state=$_POST['state'];
    $date=$_POST['date'];
    $exp=$_POST['exp'];

    // echo $state.$date;
    $con=mysqli_connect("localhost","root","","myshows");
    $query = "update socialdistance set state='$state', date='$date', expiry='$exp'";
    mysqli_query($con,$query);

    if($state=="ON")
    {
        echo("Social Distancing is Applied");
    }
    else
    {
        echo("Social Distancing is Removed");
    }
}
elseif ($str[0] == 'applycoupon') {


    $code = strtoupper($_POST['code']);
    $dis = $_POST['discount'];
    $qty = $_POST['qty'];
    $message = "";
    if (empty($_POST['user'])) {


        $con = mysqli_connect("localhost", "root", "", "myshows");
        $query = "select coupon,username from user";
        $res = mysqli_query($con, $query);


        while ($data = mysqli_fetch_assoc($res)) {
            if (empty($data['coupon'])) {
                $query = "update user set coupon = '" . $code . "-" . $dis . "-" . $qty . "' where username = '" . $data['username'] . "'";
                $r = mysqli_query($con, $query);
                $message = "Coupon applied successfully";
            } else {
                if (stristr($data['coupon'], $code)) {
                    $message = "";
                } else {
                    $query = "update user set coupon = '" . $data['coupon'] . "," . $code . "-" . $dis . "-" . $qty . "' where username = '" . $data['username'] . "'";
                    $r = mysqli_query($con, $query);
                    $message = "Coupon applied successfully";
                }
            }
        }
    } else {
        $con = mysqli_connect("localhost", "root", "", "myshows");
        $query = "select coupon from user where username = '" . $_POST['user'] . "'";
        $res = mysqli_query($con, $query);
        $data = mysqli_fetch_assoc($res);

        if (empty($data['coupon'])) {
            $query = "update user set coupon = '" . $code . "-" . $dis . "-" . $qty . "' where username = '" . $_POST['user'] . "'";
            $r = mysqli_query($con, $query);
            $message = "Coupon applied successfully";
        } else {

            if (stristr($data['coupon'], $code)) {
                $message = "Coupon already applied...";
            } else {
                $query = "update user set coupon = '" . $data['coupon'] . "," . $code . "-" . $dis . "-" . $qty . "' where username = '" . $_POST['user'] . "'";
                $r = mysqli_query($con, $query);
                $message = "Coupon applied successfully";
            }
        }
    }
    echo $message;
} elseif ($str[0] == 'socialdistanceform') {
    $state = $_POST['state'];
    $date = $_POST['date'];

    // echo $state.$date;
    $con = mysqli_connect("localhost", "root", "", "myshows");
    $query = "update socialdistance set state='$state', date='$date'";
    mysqli_query($con, $query);
    echo ("values are updated");
}
elseif($str[0] == 'getsocialdistanceform') {

    $con=mysqli_connect("localhost","root","","myshows");
    $query = "select * from socialdistance";
    $res = mysqli_query($con, $query);
    $d="";


    while ($data = mysqli_fetch_array($res)) {
        $state = $data['state'];
        $date = $data['date'];
        $expiry = $data['expiry'];

        $d .= '
            <form onsubmit="event.preventDefault()" action="" method="POST" name="socialDistancingForm" class="socialDistancingForm" id="socialDistancingForm">
                            
                <label>Social Distancing </label>

                <label class="switch">
                    <input class="switch-input" name= "state" type="checkbox" />
                    <span class="switch-label" data-on="Apply" data-off="Remove"></span> 
                    <span class="switch-handle"></span> 
                </label>
                
                <label for="social">Select Applying Date</label>
                <input type="date" name="social" id="start" value="' . $date . '"  >
                
                <label for="exp">Select Removing Date</label>
                <input type="date" name="exp" id="exp" value="' . $expiry . '" >
                
                <button class="applysocialDist">Apply To All</button>
            
            </form>

            <script>

                $("input[type=checkbox][name=state]").each(function () {
                    if("' . $state . '"=="ON") {
                        $(this).attr("checked","true");
                    }
                });
                
                // For Date Picker of Social Disatncing
                $(".socialDistancingForm #start").focus(function () {
                    var today = new Date();
                    today.setDate(today.getDate() + 3);
                    var dd = String(today.getDate()).padStart(2, "0");
                    var mm = String(today.getMonth()+1).padStart(2, "0");
                    var yyyy = today.getFullYear();
                    var t = yyyy + "-" + mm + "-" + dd;
                        
                    $(this).attr("min", t);
                });
         
                $(".socialDistancingForm #exp").focus(function () {
                    var today = new Date();
                    today.setDate(today.getDate() + 4);
                    var dd = String(today.getDate()).padStart(2, "0");
                    var mm = String(today.getMonth()+1).padStart(2, "0");
                    var yyyy = today.getFullYear();
                    var t = yyyy + "-" + mm + "-" + dd;
                    
                    if($(".socialDistancingForm #exp").val() != "") {
                        if($(".socialDistancingForm #exp").val() > t) {
                            $(this).attr("min", $(".socialDistancingForm #exp").val());
                        } else {
                            $(this).attr("min", t);
                        }
                    }
                });
                    
                $(".socialDistancingForm button").click(function () {
                    let state;
                    if ($(".socialDistancingForm .switch-input:checked").length == 1) {
                        state = "ON";
                    }
                    else {
                        state = "OFF";
                    }
                    
                    $.ajax({
                        url: "admindata.php",
                        type: "post",
                        data: {
                            str: "socialdistanceform",
                            state: state,
                            date: $(".socialDistancingForm #start").val(),
                            exp:$(".socialDistancingForm #exp").val()
                        },
                        success: function (data) {
                            alert(data);
                        }
                    });
                });
         </script>
         ';
    }
    echo $d;
}
else {
    echo "Error 404 !";
}



function uploadfile () {
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["mainfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["mainfile"]["tmp_name"]);
        
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["mainfile"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "webp" ) {
        echo "Sorry, only JPG, JPEG, PNG & WEBP files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
        echo "<script>alert('Sorry, your file was not uploaded');</script>";
        return false;
    } 
    else 
    {
        if (file_exists($target_file)) 
        {
            return true;
        }
        else
        {
            if (move_uploaded_file($_FILES["mainfile"]["tmp_name"], $target_file)) 
            {
                return true;
            }
        } 
    }
}


// For Checking WidePoster 
function uploadfile2 ()
{
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["mainfile2"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["mainfile2"]["tmp_name"]);
        
        if($check !== false) {
            echo "<script>alert('File is an image - " . $check["mime"] . ".;</script>";
            $uploadOk = 1;
        } else {
            echo "<script>alert('File is not an image.;</script>";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["mainfile2"]["size"] > 5000000000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "webp" ) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & WEBP files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
        echo "<script>alert('Sorry, your file was not uploaded');</script>";
        return false;
    } 
    else 
    {
        if (file_exists($target_file)) 
        {
            return true;
        }
        else
        {
            if (move_uploaded_file($_FILES["mainfile2"]["tmp_name"], $target_file)) 
            {
                return true;
            }
        } 
    }
}

?>