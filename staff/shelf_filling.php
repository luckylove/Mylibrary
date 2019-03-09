<?php
session_start();
//header('location:staffportal.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
  //echo" connection is successuful   pp";
}
else{
  echo" no connection";
}
// now the session is complete
mysqli_select_db($con,$database) or die( "Unable to select database");


if(isset( $_POST['shelfid']) && isset( $_POST['sectionid'])){
$shelfid=$_POST['shelfid'];
$sectionid=$_POST['sectionid'];


$q=" select * from shelf where shelfid= '$shelfid';";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
echo $num;
if($num==1)
{
  header('location:shelfid_error.php');
}
else {

  $qy="insert into shelf (shelfid,sectionid) values('$shelfid','$sectionid')";
    mysqli_query($con,$qy);
    header('location:staffportal.php');

}

}
