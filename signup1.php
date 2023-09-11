<!-- 
$showalert=false;
include 'dbconnect.php';
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $psw=$_POST['psw'];
    

    $sql="INSERT INTO users (email,psw)values('$email','$psw')";
    $result=mysqli_query($con,$sql);
    if($result){
      $showalert=true;
    }else{
 die(mysqli_error($con));

    }
}

?> -->
<?php
session_start();
$exists=false;
$showalert=false;
$showerror=false;
$emailerr=false;
include 'connect.php';
if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $psw=mysqli_real_escape_string($con,$_POST['psw']);
    $cpsw=mysqli_real_escape_string($con,$_POST['cpsw']);
    $query="SELECT * FROM users where email='$email'";
    $insert_row = "SELECT * FROM users";
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
      $emailerr=true;
    }else{
    $hashed_psw=password_hash($psw,PASSWORD_DEFAULT);
    
    $exists=false;
    if($psw==$cpsw){
    $psw1=md5($psw);
      $query1="INSERT INTO users (email,psw)values('$email','$psw1')";
    $result=mysqli_query($con,$query1);
   
   
    
    if($result){
     
    

				
				$_SESSION['email'] = $email;

        $showalert=true;
    }else{
 die(mysqli_error($con));

    }}
    if($psw!=$cpsw){
      $showerror=true;
    }
    
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
    <title>Sign up</title>
  </head>
  <body style="height:100vh;">
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
    <?php
    if($exists){
      echo' <div class="alert alert-success alert-dismissible fade show" role="alert"style="margin-left:50px">
      <strong>Exists!</strong> Your account already exists.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}
    if($showalert){
        echo' <div class="alert alert-success alert-dismissible fade show" role="alert"style="margin-left:50px">
        <strong>Success!</strong> Your account is now created and you can log in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }if($showerror){
        echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Passwords do not match
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }if($emailerr){
      echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Email address</strong> format is not valid.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
   
   ?>
     <div class="container"style="margin-top:10%;width:40%;">
         <h1 class="text-center">Sign up to our website </h1>
         <form action="signup1.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1"style="font-weight:500;font-size:25px;margin:2%;" class="form-label">Email address</label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"style="font-weight:500;font-size:25px;margin:2%;" class="form-label">Password</label>
    <input type="password" name="psw"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1"style="font-weight:500;font-size:25px;margin:2%;" class="form-label">Confirm Password</label>
    <input type="password" name="cpsw" class="form-control" id="exampleInputPassword1">
  </div>
 <?php
  echo'<div class="mb-3">
    
  <label class="form-check-label" for="exampleCheck1">Already have an account have an account?<a href="login.php">Login</a></label>
</div>';
 
?>
  <button type="submit" style="font-weight:500;font-size:15px;margin:2%;"class="btn btn-primary" name="submit">Sign Up</button>
</form>
</div>
     
     
        </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>