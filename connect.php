<?php
$con= new mysqli('localhost','root','','psw');
if(!$con){
  die(mysqli_error($con)) ; 
}
?>