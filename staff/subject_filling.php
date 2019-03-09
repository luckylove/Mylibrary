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

if(isset( $_POST['subjectname']) && isset( $_POST['shelfid'])){

        $subjectname = $_POST['subjectname'];
        $shelfid = $_POST['shelfid'];
        // now form here onwards we have to start the session varible
        // which is most important part here
        // to use it furthur for the  profile and furthur Registration

        //   $_SESSION['username']=$name;
        // no we need to write our query
        //echo  $name;
        //echo" $pass";
        $q=" select * from subject where subjectname='$subjectname';";
        $result = mysqli_query($con,$q);
        $num = mysqli_num_rows($result);
        echo $num;
        if($num==1)
        {
          header('location:subject_filling_error.php');
        }
        else {
        // now we need to write our insert query
          $qy="insert into subject (subjectname,shelfid) values('$subjectname','$shelfid')";
          // now we can fire the query accoridngly
          mysqli_query($con,$qy);
          header('location:subjectadd.php');

        }
      }




 ?>
