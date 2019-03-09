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

// we need to put the button so that we can move to the back

// now we have bookno only and we have to track the book and display it in the table
$bookno = $_POST['bookno'];
$_SESSION['bookno']=$bookno;
 $q =" select  B.subjectname as subjectname , B.shelfid as shelfid , SH.sectionid as sectionid, S.department as department from book AS B,
 shelf AS SH, section AS S where B.bookno='$bookno' AND B.shelfid = SH.shelfid AND SH.sectionid = S.sectionid;";

$result= mysqli_query($con,$q);
if($result == false)
{
  echo 'The query by bookno failed.';
  exit();
}
$row = mysqli_fetch_array($result);
$subjectname=$row['subjectname'];
$shelfid=$row['shelfid'];
$sectionid=$row['sectionid'];
$department=$row['department'];

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

          <div class="col-lg-8 card m-auto">
            <h2 class="card-header text-center"> TRACK BOOK RESULT  </h2>
            <div class="card-body">

              <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th> BOOK NO </th>
                          <th> SUBJECT </th>
                          <th> SHELF </th>
                          <th> SECTION  </th>
                          <th> DEPARTMENT </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $bookno; ?></td>
                          <td><?php echo $subjectname; ?></td>
                          <td><?php echo $shelfid; ?></td>
                          <td><?php echo $sectionid; ?></td>
                          <td><?php echo $department; ?></td>

                        </tr>
                      </tbody>
                    </table>
           </div>
       </div>


  </div>
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
