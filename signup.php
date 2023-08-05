<?php
error_reporting(0);

$con=mysqli_connect("localhost","root","","MyShows");

$a=$_POST['username'];
$b=$_POST['email'];
$c=$_POST['password'];

$query="select * from user where email='$b'";
$res=mysqli_query($con,$query);

if (mysqli_num_rows($res)>0) {
    echo "<script>
        alert('Email already exist...');
        window.location.href='index.html';
        </script>";
}

$query="insert into user values ('$a','$b','$c')";
$res=mysqli_query($con,$query);

$cookie_name = "username";
$cookie_value = $a;
setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");

echo "<script>
    alert('Account registred successfully');
    window.location.href='index.html';
    </script>";
?>

