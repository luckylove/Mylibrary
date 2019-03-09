<?php
session_start();
//header('location:select.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
//  echo" connection is successuful   pp";
}
else{
  echo" no connection";
}
mysqli_select_db($con,$database) or die( "Unable to select database");
?>









<!DOCTYPE html>
<html>
<head>
     <title> My library  </title>
      <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>

  <div class="container m-auto ">
      <div class="text-center text-primary"><h1><br> Welcome to My library  <br></h1></div>
      <br>
      <br>
      <div class="row">
          <div class="col-lg-6 card m-auto">
            <h2 class="card-header text-center">  STUDENT HOME  </h2>
            <div class="card-body">
              <br>
              <!-- first of all we need to search the book accordingly here and we can search the book by three ways -->
              <!-- one is by book no then by author name and then by the title -->
               <form  action="studentqueries/booksearch.php" method="post">
                   <button class="btn btn-primary text-center m-auto d-block" type="submit" > Search Book </button>
               </form>
                 <br>
               <form  action="studentqueries/trackbooklocation.php" method="post">
                   <button class="btn btn-primary text-center m-auto d-block" type="submit" > Track Book Location </button>
               </form>
                 <br>
               <form  action="studentqueries/checkout.php" method="post">
                   <button class="btn btn-primary text-center m-auto d-block" type="submit" > Checkout the Book </button>
               </form>
                 <br>
               <form  action="studentqueries/futureholdrequestforthebook.php" method="post">
                   <button class="btn btn-primary text-center m-auto d-block" type="submit" > Future Hold request for Book </button>
               </form>
                 <br>
               <form  action="studentqueries/requestextension.php" method="post">
                   <button class="btn btn-primary text-center m-auto d-block" type="submit" > Request Extension</button>
               </form>
                 <br>
               <form  action="studentqueries/returnbook.php" method="post">
                   <button class="btn btn-primary text-center m-auto d-block" type="submit" > Return the Book </button>
               </form>
                 <br>  <br>
           </div>
         </div>

     </div>
     <br>
     <form  action="studentlogout.php" method="post" >
          <button class="btn btn-primary m-auto d-block" type="submit" > Logout </button>
     </form>


     <br>


     <br>  <br><br>  <br>
   </div>
 </body>
