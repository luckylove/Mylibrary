<?php
session_start();
header('location:registration.php');
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

if(isset( $_POST['username']) && isset( $_POST['password']) && isset( $_POST['confirmpassword'])){

        $name = $_POST['username'];
        $pass = $_POST['password'];
        $cpass = $_POST['confirmpassword'];
        // now form here onwards we have to start the session varible
        // which is most important part here
        // to use it furthur for the  profile and furthur Registration
        
       $_SESSION['username']=$name;
        // no we need to write our query
        //echo  $name;
        //echo" $pass";
        if($pass!=$cpass)
        {
          header('location:password_error_student_registration.php');
        }
        else{
            $q=" select * from student where username='$name';";
            $result = mysqli_query($con,$q);
            $num = mysqli_num_rows($result);
            echo $num;
            if($num==1)
            {
              header('location:userid_error_student_registration.php');
            }
            else {
            // now we need to write our insert query
              $qy="insert into student (username,password) values('$name','$pass')";
              // now we can fire the query accoridngly
              mysqli_query($con,$qy);
              header('location:studentprofile.php');

            }
        }
      }


         //echo " $q";
        // now we need to fire the query

      /*  if($num==1)
        {
          echo" already registered id";
        }
        else {
        // now we need to write our insert query
          $qy="insert into student (username,password) values('$name','$pass')";
          // now we can fire the query accoridngly
          mysqli_query($con,$qy);
        }
        */

 ?>
