<?php
session_start();

include 'connect.php';
$showerror=false;
if(isset($_POST['login'])){
   


    $user=$_POST['email'];
    $psw=$_POST['psw'];
    $psw2=md5($psw);


    $sql="SELECT * FROM users WHERE email='$user'";
    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $loginid=$row['id'];
        $password=$row['psw'];
        $username=$row['email'];
        
        $password_decode=password_verify($psw,$password);
       
        // if($password==$psw){
          if($psw2==$password){
           $_SESSION['login']=$user;
           $_SESSION['email']=$username;
           $_SESSION['id']=$id;
          //  echo "username is valid";
         
          header("location:display.php");
        }
        else{
          $showerror=true;
        }
}}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    <title>Log in</title>
    <style>
      .err-msg{
     color:red;
   }
    </style>
  </head>
  <body>
  <?php
  if($showerror){
        echo' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-left:50px;">
        <strong>Error!</strong> Invalid credentials
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
   
   ?>
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
              <a href="#home" class="nav_menu_link">HOME</a>
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
  

    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Optional JavaScript; choose one of the two! -->
  
    <div class="container " style="margin-top:6%;width:40%;">
         <h1 class="text-center">Login to our website </h1>
         <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" style="font-weight:500;font-size:25px;margin:2%;"class="form-label font-weight-bold">Email address</label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
   </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" style="font-weight:500;font-size:25px;margin:2%;"class="form-label font-weight-bold ">Password</label>
    <input type="password" name="psw"class="form-control" id="exampleInputPassword1" required>
   </div>
  
  
  
   
   
  <div class="mb-3 ">
    
    <label class="form-check-label" for="exampleCheck1">Do not have an account?<a href="signup1.php">create account</a></label>
  </div>
  <button type="submit" style="font-weight:500;font-size:25px;margin:2%;"name="login"class="btn btn-primary">Log in
              </button>
 <!--<button type="submit" style="font-weight:500;font-size:25px;margin:2%;"class="btn btn-primary font-weight-bold" name="login">Log in</button>
  --></form>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>