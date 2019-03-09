<?php
session_start();
//header('location:select.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
  echo" connection is successuful   pp";
}
else{
  echo" no connection";
}
mysqli_select_db($con,$database) or die( "Unable to select database");


$username = $_SESSION['username'];
echo "something";
echo $_POST['issueid'] ;
echo $_POST['isdamaged'] ;
if(isset($_POST['issueid']) and isset($_POST['isdamaged']))
      {
        echo "something";
      	$issueid = $_POST['issueid'];
      	$isdamaged = $_POST['isdamaged'];
      	$_SESSION['issueid']=$issueid;

      	$q = "Select bookno,copyid,returndate from issuetable  Where issueid = '$issueid'";
      	//Run our sql query
      	$result = mysqli_query ($con, $q)  or die(mysqli_error($con));
      	if($result == false){
      		echo 'The query failed.';
      		exit();
      	}
      	$numrow = mysqli_num_rows($result);
      	if($numrow == 0)
        {
      		echo 'YOU Have Entered Wrong Issue Id';
      	}
        else
        {
      		$row = mysqli_fetch_array($result);
      		$bookno = $row['bookno'];
      		$copyid = $row['copyid'];
      		$_SESSION['bookno']=$bookno;
      		$_SESSION['copyid']=$copyid;


      		$returndate = $row['returndate'];
      		$returndate_copy = new DateTime($returndate);

          // new date time is used to format the date time according to our will
          // means to format the date time which is already set
          // to whatever we want accordignly for it


      	//	$today = date("Y-m-d");      // here for the testing puupose i can change the value of today to some other value

      	//	$today_copy = new DateTime($today);
            $today_copy = new DateTime('2018-5-20');
          // this is the object oriented format of finding the difference of the date
          // in the procedural format
          // we can write like that
        //    $datetime1 = date_create('2009-10-11');
          //  $datetime2 = date_create('2009-10-13');
          //  $interval = date_diff($datetime1, $datetime2);
        //    echo $interval->format('%R%a days');
        //
        // and in the object oriented format we wirte like  that
        //$datetime1 = new DateTime('2009-10-11');
        //  $datetime2 = new DateTime('2009-10-13');
        //  $interval = $datetime1->diff($datetime2);
        //  echo $interval->format('%R%a days');

        // we can too specify that in which format we want to get th result
        //    $interval->format('%d days');
        // that is we want that the difference comes out to be in the form of the date accordingly for it

           // it baiscally returns the differnce the sign can be calculated by using the

           // $resultTime->invert, which returns 1 if the difference is negative,
           // or 0 if it is positive. Unfortunately, it is undocumented in the official PHP doc

           // at any time if we want to change the formatting of the date we use

           //$datetime->format('Y\-m\-d\ h:i:s');
           // format function is used to change the formatting of the date time accordingly for it

           ///////////////////////////////////////////////////////////////////////////
           // one more example
           /*

           $datetime1 = new DateTime('2009-10-11 12:12:00');
           $datetime2 = new DateTime('2009-10-13 10:12:00');
           $interval = $datetime1->diff($datetime2);
           echo $interval->format('%Y-%m-%d %H:%me:%s');

           */



           /////////////////////////////////
           // one more example
            /*
            $datetime1 = new DateTime('2009-10-11 12:12:00');
            $datetime2 = new DateTime('2009-10-13 10:12:00');
            $interval = $datetime1->diff($datetime2);
            echo $interval->s;
            echo $interval->h;
            echo $interval->d;

            // output
                      0
                      22
                      1
            */



      		$interval = $today_copy->diff($returndate_copy)->days; // returndate_copy - today_copy
      		$invert = $today_copy->diff($returndate_copy)->invert;

      		if($invert == 1)
           {
      			$newpenalty = $interval * 1.0;
            $_SESSION['newpenalty']=$newpenalty;
      			$qy = "Select panalty  From studentprofile Where username = '$username';";
      			//Run our sql query
      			$result = mysqli_query ($con, $qy)  or die(mysqli_error($con));
      			if($result == false)
      			{
      				echo 'The query failed.';
      				exit();
      			}
      			$row = mysqli_fetch_array($result);
      			$penalty = $row['panalty'];                             // i wrote the spelling of the panalty in the database wrong so i am writhing the same here
      			$updatepenalty = $newpenalty + $penalty;
      			//Our SQL Query
      			$qry = "UPDATE studentprofile  SET panalty = '$updatepenalty' Where username = '$username'";
      			//Run our sql query
      			$result = mysqli_query ($con, $qry)  or die(mysqli_error($con));
      			if($result == false)
      			{
      				echo 'The query failed.';
      				exit();
      			}
      			if($updatepenalty >= 100){
      				//Our SQL Query
      				$query = "UPDATE studentprofile  SET cardblock = 1 Where username = '$username'";
      				//Run our sql query
      				$result = mysqli_query ($con, $query)  or die(mysqli_error($con));
      				if($result == false)
      				{
      					echo 'The query failed.';
      					exit();
      				}
      			}
      		}
      		//Our SQL Query
      		$q = "UPDATE bookcopyinfo SET ischecked = 0 Where bookno = '$bookno' AND copyid = '$copyid' ;";
      		//Run our sql query
      		$result = mysqli_query ($con, $q)  or die(mysqli_error($con));
      		if($result == false)
      		{
      			echo 'The query failed.';
      			exit();
      		}

      	  header('Location:returnsuccess.php');

      		if($isdamaged == 1)
          {
            // then also we need to increase the panalty to the damaged book to the student accordingly for it
            // i think we too need to consider the lost case here ok for me
      			header('Location: LostDamagedBook_User.php');
      		}
      	}
}
?>
