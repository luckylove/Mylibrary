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

if(isset( $_POST['department']) && isset( $_POST['incharge'])){

        $department = $_POST['department'];
        $incharge = $_POST['incharge'];
        // now form here onwards we have to start the session varible
        // which is most important part here
        // to use it furthur for the  profile and furthur Registration

        //   $_SESSION['username']=$name;
        // no we need to write our query
        //echo  $name;
        //echo" $pass";
              $qy="insert into section (department,sectionincharge) values('$department','$incharge')";
              // now we can fire the query accoridngly
              mysqli_query($con,$qy);
              header('location:Section_added_successfully.php');

            }




 ?>
