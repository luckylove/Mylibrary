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

  if(isset($_POST['bookno']))
          {
          $availdate = null;
          $copyid = null;
          // these variables store the available date and the copy id of the book
          // then i decide to so certain things
          $bookno = $_POST['bookno'];
          $_SESSION['bookno'] = $bookno;

           // now i take a decide variable that will decide what to do accordingly
           // this variable is used to decide in which if else variable we are moving and
           // according to this we print the result in the html formatting accordingly

          $decide = NULL;

          $q ="select bookno from book where bookno='$bookno' and reserved='0';";
          $result = mysqli_query ($con, $q)  or die(mysqli_error($con));
          if($result == false)
          {
            echo 'The query by bookno failed.';
            exit();
          }
          $num = mysqli_num_rows($result);
          if($num==0)
          {
            // either the bookno is wrong
            // means that book of that bookno never exists in the library
            // means that book belongs to the reserved categoried
            // you can't make the book to be issued
            $decide=1;
          }
          else
          {
            $query = "Select COUNT(copyid) AS copynum From bookcopyinfo  Where bookno='$bookno' AND ishold = 0 AND ischecked = 0 AND isdamaged = 0";

            $result = mysqli_query ($con, $query)  or die(mysqli_error($con));
            if($result == false)
            {
              echo 'The query by bookno  failed.';
              exit();
            }
            $row = mysqli_fetch_array($result);
            $copynum = $row['copynum'];
            	if($copynum != 0)
              {
                // means copies are available right now go back and take the copies accordingly
                $decide=2;
              }
              else
              {
                // copies are not available right now
                // now we need to make the future request if future request is not already maded
              //  $today = "2015-4-10";
              $today = date("Y-m-d");
              //  echo $bookno;
                //AND
                $qy = "Select copyid From issuetable  Where bookno = '$bookno'AND returndate > '$today' ;";

              //  $qy = "Select Min(returndate) AS availdate , I.copyid From  bookcopyinfo AS BC, issuetable AS I Where I.bookno = '$bookno' AND BC.bookno = I.bookno AND isdamaged = 0 AND BC.copyid = I.copyid AND (ishold = 1 OR ischecked = 1) AND returndate > '$today' ;";
                //Run our sql query
                $result = mysqli_query ($con, $qy)  or die(mysqli_error($con));
                if($result == false)
                {
                  echo 'The query by bookno  failed.';
                  exit();
                }

                $numrow = mysqli_num_rows($result);
                // echo $numrow;
                   	if($numrow == 0)
                    {
                      // means the book is not issued to someone
                      // and form above we get that the book is not available right now
                      // so this means that the book is their but damaged so cannot be issue to someone
                      $decide = 3;

                    }
                    else
                     {
                       // now we need to find out the minimum available date
                       // from the issuetable
                      $qy = "Select MIN(returndate) AS availdate From issuetable  Where bookno = '$bookno' AND returndate > '$today' ;";
                         $result = mysqli_query ($con, $qy)  or die(mysqli_error($con));
                         if($result == false)
                         {
                           echo 'The query by bookno  failed.';
                           exit();
                         }
                       // now we need to make the future request if not already maded
                       $row = mysqli_fetch_array($result);
                       $availdate = $row['availdate'];

                       // now we need to find out the minimum copyid corresponding to that available date accordingly for it


                       $qy = "Select MIN(copyid) AS copyid From issuetable  Where bookno = '$bookno' AND returndate ='$availdate' ;";
                          $result = mysqli_query ($con, $qy)  or die(mysqli_error($con));
                          if($result == false)
                          {
                            echo 'The query by bookno  failed.';
                            exit();
                          }
                      $row = mysqli_fetch_array($result);
                       $copyid = $row['copyid'];
                    //   echo $copyid;
                    //   echo $availdate;
                       $query = "Select futurerequester From bookcopyinfo  Where bookno = '$bookno' AND copyid = '$copyid';";
                       $result = mysqli_query ($con, $query)  or die(mysqli_error($con));
                       if($result == false)
                       {
                         echo 'The query by bookno failed.';
                         exit();
                       }
                       $row = mysqli_fetch_array($result);

                       $futurerequester = $row['futurerequester'];
                           if($futurerequester != NULL)
                           {
                             // means that book i already requested for the future by someone accordingly for it what to say next regarding this
                             $decide = 4;
                           }
                           else
                            {
                              // so finally i can make the future request accordingly for it

                             $qry = "UPDATE bookcopyinfo SET futurerequester = '$username' Where bookno = '$bookno' AND copyid = '$copyid' ;";
                             //Run our sql query
                             $result = mysqli_query ($con, $qry)  or die(mysqli_error($con));
                             if($result == false)
                             {
                               echo 'The query by bookno failed.';
                               exit();
                             }
                            // decide 5 decides that the future hold request is successful ok
                             $decide = 5;
                             // now our future hold request is successuful
                            // echo 'Future Hold Success';

                           }
                    }
              }
        }


    }


// now we need to set the html according to the decides


?>

<!DOCTYPE html>
<html>
<head>
     <title> My library  </title>
      <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
  <div class="container m-auto ">
      <div class="text-center text-success"><h1><br> Welcome to My library  <br></h1></div>
      <br>
      <br>
      <div class="row">
          <div class="col-lg-6 card m-auto">
            <h2 class="card-header text-center">  Future Hold Request Result  </h2>


<!-- now we need to decide what to print on the screeen depending on the value of the decide ok -->


            <?php if($decide==5)
            {
            ?>
            <div class="card-body">
              <label>
               <strong>Future Request is Made successful </strong>
             </label>
              <label>
              Book Number <strong><?php  echo $bookno; ?></strong>
             </label>
             <br>
              <label>
              Copy Id  <strong><?php  echo $copyid; ?></strong>
            </label>
            <br>
            <label>
             Expected Avalilable Date  <strong><?php  echo $availdate; ?></strong>
            </label>
            <br>
             </div>
          <?php
           }
          else if($decide==4){
           ?>
            <div class="card-body">
              <label>
            <strong>  Sorry.........  Some one Already Made The Future Request on this Book</strong>
            </label>
            <br>
             <label class="text-center">
             Book Number <strong><?php  echo $bookno; ?></strong>
            </label>
            <br>
            </div>
          <?php }
          else if($decide==3){
             ?>
             <div class="card-body">
               <label>
             <strong>  Sorry.........  This Book is Damaged and Can't be Issed to someone right now</strong>
             </label>
             <br>
              <label class="text-center">
              Book Number <strong><?php  echo $bookno; ?></strong>
             </label>
             <br>
             </div>
           <?php }
           else if($decide==2){
              ?>
              <div class="card-body">
                <label>
              <strong> The copies are available Right Now please go Back and Find Some</strong>
              </label>
              <br>
               <label class="text-center">
               Book Number <strong><?php  echo $bookno; ?></strong>
              </label>
              <br>
              </div>
            <?php }
            else {
               ?>
               <div class="card-body">
                 <label>
               <strong>  Sorry.... This Book Belongs to the reserved categories You can't take this book  </strong>
               </label>
               <br>
                <label class="text-center">
                Book Number <strong><?php  echo $bookno; ?></strong>
               </label>
               <br>
               </div>
             <?php }  ?>

       </div>


  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <form  action="\mylibrary\studenthome.php" method="post" >
       <button class="btn btn-success m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
