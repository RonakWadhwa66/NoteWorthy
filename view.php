<?php
include 'connect.php';

session_start();
function str_openssl_enc($str,$iv){
  $key="namrata";
$chiper="AES-128-CTR";
$options=0;
$s=openssl_encrypt($str,$chiper,$key,$options,$iv);
return $s;
}
$enteredid=$_SESSION["login"];
if(isset($_POST['submit'])){
  $iv=openssl_random_pseudo_bytes(16);
  $i=bin2hex($iv);
    $pswfor=$_POST['pswfor'];
    $psw=$_POST['psw'];
   $encpsw=str_openssl_enc($psw,$iv);
    $sql="INSERT INTO view (pswfor,psw,userid,iv)values('$pswfor','$encpsw','$enteredid','$i')";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:display.php');
    }else{
 die(mysqli_error($con));

    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>add password</title>
  </head>
  <body>
  <header class="container header">
  <nav class="nav">
        <div class="logo">
          <h2>NOTEWORTHY</h2>
        </div>

        <div class="nav_menu" id="nav_menu">
          <button class="close_btn" id="close_btn">
            <i class="ri-close-fill"></i>
          </button>

          <ul class="nav_menu_list">
            
            <li class="nav_menu_item">
              <a href="index.html" class="nav_menu_link">HOME</a>
            </li>
            <li class="nav_menu_item">
              <a href="#" class="nav_menu_link">ABOUT US</a>
            </li>
            
            <li class="nav_menu_item">
              <a href="contact.html" class="nav_menu_link">CONTACT</a>
            </li>
            
          </ul>
        </div>

        <button class="toggle_btn" id="toggle_btn">
          <i class="ri-menu-line"></i>
        </button>
      </nav>
  </header>
  

   <div class="container my-5">
       <h1>ADD PASSWORD</h1>
   <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password for</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="pswfor"aria-describedby="emailHelp" autocomplete="off">
    
  </div>
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="psw" autocomplete="off">
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>