<?php
session_start();
error_reporting(0);

$con=mysqli_connect("localhost","root","","MyShows");
if(isset($_POST['loginb']))
{
    $a=$_POST['email'];
    $b=$_POST['password'];

    $var = $_POST['admin'];
    
    if(isset($var)) {
        $query="select * from admin where email='$a' and password='$b'";
    }
    else{
        $query="select * from user where email='$a' and password='$b'";
    }

    $res=mysqli_query($con,$query);

    if (mysqli_num_rows($res)>0)
    {
        echo "<script>
            alert('Login done successfully');
            </script>";
        
        if(isset($var)) {
            $query = "select username from admin where email='$a' and password='$b'";
            $res=mysqli_query($con,$query);
            $data = mysqli_fetch_array($res);
            $username = $data['username'];
            $_SESSION["user"] = $username;
            
            echo "<script>
            window.location.href='admin.php#home';
            </script>";
        }
        else {
            $query = "select username from user where email='$a' and password='$b'";
            $res=mysqli_query($con,$query);
            $data = mysqli_fetch_array($res);
            $username = $data['username'];
            $cookie_name = "username";
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");
            
            echo "<script>
                // alert('".$_POST['pageName']."');
                window.location.href='".$_POST['pageName']."';
                </script>";
        }
    }
    else
    {
         echo "<script>
            alert('Login failed');
            </script>";
    }

}
