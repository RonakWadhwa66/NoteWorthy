<?php 
include 'connect.php';


session_start();
function str_openssl_dec($str,$iv){
  $key="namrata";
$chiper="AES-128-CTR";
$options=0;
$s=openssl_decrypt($str,$chiper,$key,$options,$iv);
return $s;
}
if(isset($_SESSION['login'])){
  
$userid=$_SESSION['login'];

// $user="SELECT * FROM users where id='$userid'";
// $sql1=mysqli_query($con,$user);

// while($r=mysqli_fetch_assoc($sql1)){
//   echo"my username";
//   $username=$r['email'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/nav.css" />
    <title>view password</title>
</head>
<body>
<header class="container header">
      <!-- ==== NAVBAR ==== -->
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
            <li class="nav_menu_item">
              <a href="contact.html" class="nav_menu_link"><?php echo $userid;?></a>
            </li>
           
          </ul>
        </div>

        <button class="toggle_btn" id="toggle_btn">
          <i class="ri-menu-line"></i>
        </button>
      </nav>
    </header>
    <div class="container my-5">
        <button class="btn btn-primary"> <a href="view.php" class="text-light">Add password</a>
            </button>
            <table class="table">
  <thead>
    <tr>
    
      <th scope="col">Password for</th>
     
      <th scope="col">Password</th>
      
    </tr>
  </thead>
  <tbody>
      <?php
   
      $sql="SELECT * FROM view where userid='$userid'";
     
      $result=mysqli_query($con,$sql);
      if($result){
          while($row=mysqli_fetch_assoc($result)){
            
              $id=$row['id'];
              $pswfor=$row['pswfor'];
              $psw=$row['psw'];
              $iv=hex2bin($row['iv']);
            $decpsw=str_openssl_dec($psw,$iv);
              echo ' <tr>
              
              <td>'.$pswfor.'</td>
             
              <td>'.$decpsw.'</td>
              
              <td><button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a>
              </button></td>
              
              
            </tr>
           
            
            
            
            ';
          
            }
      }
      ?>
   
  </tbody>
</table>  
    </div>
    
</body>
</html>
<?php
}
else{
  header("location:login.php");
}?>