<?php
session_start();
//header('location:bookadd.php');
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

if(isset( $_POST['bookno']) ){

        $bookno = $_POST['bookno'];
        
        $_SESSION['bookno']=$bookno;
        // now form here onwards we have to start the session varible
        // which is most important part here
        // to use it furthur for the  profile and furthur Registration

    //   $_SESSION['username']=$name;
        // no we need to write our query
        //echo  $name;
        //echo" $pass";

            $q=" select * from book where bookno='$bookno';";
            $result = mysqli_query($con,$q);
            $num = mysqli_num_rows($result);
            echo $num;
            if($num==1)
            {
              header('location:book_error_checking_message.php');
            }
            else {
            // now we need to write our insert query
              //$qy="insert into  (username,password) values('$name','$pass')";
              // now we can fire the query accoridngly
            //  mysqli_query($con,$qy);


            // we are not inserting here we make a session variable and the call the next file at the end we make the
            // insert statement where the whole information of the book is known
              header('location:bookadd(1).php');

            }

      }



 ?>
