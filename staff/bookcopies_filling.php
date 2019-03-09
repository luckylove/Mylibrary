<?php
session_start();
//header('location:sectionadd.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
  echo" connection is successuful   pp";
}
else{
  echo" no connection";
}
// now the session is complete
mysqli_select_db($con,$database) or die( "Unable to select database");
$copies=$_POST['copies'];
$_SESSION['copies']=$copies;


$bookno=$_SESSION['bookno'];
 // now to find out the copy id we nned to first of all retrive the copy id already used then according to that
 // we start filling the result accordingly for it
 $q=" select * from bookcopyinfo where bookno='$bookno';";
 $result = mysqli_query($con,$q);
 $num = mysqli_num_rows($result);

echo $num;
 // now we get the number of copies we have accordingly in the bookcopyinfo
 $num++;
 while($copies>0){
   echo $num;
   $insertstatement = "INSERT INTO bookcopyinfo (bookno,copyid,ischecked,ishold,isdamaged)
    VALUES ('$bookno','$num',0,0,0)";
  // now we need to fire the query accordingly for it
	  $result = mysqli_query ($con, $insertstatement)  or die(mysqli_error($con));

   $num++;
   $copies--;
 }
if($copies==0)
{
  header('location:bookcopies_add_successful.php');
}











?>
