<?php
include 'connect.php';
function str_openssl_dec($str,$iv){
  $key="namrata";
$chiper="AES-128-CTR";
$options=0;
$s=openssl_decrypt($str,$chiper,$key,$options,$iv);
return $s;
}
function str_openssl_enc($str,$iv){
  $key="namrata";
$chiper="AES-128-CTR";
$options=0;
$s=openssl_encrypt($str,$chiper,$key,$options,$iv);
return $s;
}
$id=$_GET['updateid'];
$sql="SELECT * FROM view where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$pswfor=$row['pswfor'];
$psw=$row['psw'];
$iv=hex2bin($row['iv']);
$decpsw=str_openssl_dec($psw,$iv);
if(isset($_POST['submit'])){
  $iv=openssl_random_pseudo_bytes(16);
  $i=bin2hex($iv);
    $pswfor=$_POST['pswfor'];
    $psw=$_POST['psw'];
    $newenc=str_openssl_enc($psw,$iv);

    $sql="UPDATE view set id='$id',pswfor='$pswfor',psw='$newenc' where id=$id";
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

    <title>update password</title>
  </head>
  <body>
   <div class="container my-5">
       <h1>UPDATE PASSWORD</h1>
   <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password for</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="pswfor"aria-describedby="emailHelp" autocomplete="off" value="<?php echo $pswfor;?>">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="psw" autocomplete="off" value="<?php echo $decpsw;?>">
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