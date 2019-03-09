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
?>


<!DOCTYPE html>
<html>
<head>
     <title> My library  </title>
      <link href="bootstrap.css" type="text/css" rel="stylesheet">
      <style>
      select {
          width: 50%;
          padding: 10px 20px;
          border: none;
          border-radius: 4px;
          background-color: #f1f1f1;
      }
      </style>
</head>
<body>
  <div class="container m-auto ">
      <div class="text-center text-danger"><h1><br> Welcome to My library  <br></h1></div>
      <br>
      <br>
      <div class="row">

          <div class="col-lg-6 card m-auto">
            <h2 class="card-header text-center">  Book Addition </h2>
            <div class="card-body">
               <form  action="bookadd(2).php" method="post">
                   <div class="form-group">
                     <label>
                       Shelf Id To Add The Book
                     </label>
                     <br>
                     <select name="shelfid" required>

                       <?php

                           $flag=0;
                           $store=0;
                           $doprocess=1;
                           $qy=" select * from shelf ;";
                            $result = mysqli_query($con,$qy);
                            while($row=mysqli_fetch_array($result)){
                             $sectionid=$row['sectionid'];
                            //  $department=$row['department'];

                            // the below process we are doing to that the multiple value of same section
                            // cannot come to the select statement
                            if($flag==0)
                            {
                              // used for storing at the time
                              // when store  is initially empty

                              $store=$sectionid;
                              $doprocess=1;
                              $flag=1;
                            }
                            else
                            {
                                 if($sectionid==$store  )
                                 {
                                   // leave this thing
                                   $doprocess=0;
                                 }
                                 else
                                 {
                                   // process that section id
                                   // we need to process that section id
                                   $store=$sectionid;
                                   // store the new section id
                                    $doprocess=1;
                                  }
                            }
                                if($doprocess==1){
                                                $qq=" select * from section where sectionid='$sectionid' ;";
                                                $result1 = mysqli_query($con,$qq);
                                                while($row1=mysqli_fetch_array($result1)){
                                                  $department=$row1['department'];
                                                }
                                      ?>


                                     <optgroup label="<?php echo $department ?>">


                                      <?php
                                          $q=" select * from shelf where sectionid='$sectionid' ;";
                                         $result2 = mysqli_query($con,$q);
                                         while($row2=mysqli_fetch_array($result2)){
                                            $shelfid=$row2['shelfid'];
                                           //  $department=$row['department'];
                                       ?>


                                       <option class="text-center  m-auto  d-block " value="<?php echo $shelfid ?> "> <?php echo $shelfid ?> </option>


                                       <?php } ?>
                                       </optgroup>


                                     <?php }} ?>

                     </select>




                  <!--   <input type="text" name="shelfid" class="form-control" required > -->
                   </div>

                   <button class="btn btn-danger m-auto d-block" type="submit" > Next -> </button>
               </form>
           </div>
       </div>


  </div>
  <br>
  <form  action="bookadd.php" method="post" >
       <button class="btn btn-danger m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
