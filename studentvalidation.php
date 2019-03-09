<?php
session_start();
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
if($con){
  echo" connection is successuful";
}
else{
  echo" no connection";
}
// now the session is complete
mysqli_select_db($con,$database);

$name = $_POST['username'];
$pass = $_POST['password'];
// no we need to write our query
//echo $name ;
//echo $pass ;
$q=" select * from student where username='$name' && password ='$pass' ";

 //echo " $q";
// now we need to fire the query
$result = mysqli_query($con,$q);

$num = mysqli_num_rows($result);
if($num==1)
{
  // we take here the session variable accordingly
  $_SESSION['username']=$name;
  header('location:studenthome.php');

}
else {
  header('location:student_unableto_login.php');
}

 ?>
