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
               <form  action="bookadd(3).php" method="post">

                   <div class="form-group">
                     <label>
                       Subject Name
                     </label>
                    <select name="subjectname" required>


                     <?php
                     $shelfid = $_POST['shelfid'];
                     $_SESSION['shelfid']=$shelfid;

                     // now we create the session variable shelfid which i can use furthur accordingly for it

                         $q=" select * from subject where shelfid='$shelfid' ;";
                        $result = mysqli_query($con,$q);
                        while($row=mysqli_fetch_array($result)){
                           $subjectname=$row['subjectname'];
                          //  $department=$row['department'];
                      ?>


                      <option class="text-center  m-auto  d-block " value="<?php echo $subjectname ?> "> <?php echo $subjectname ?> </option>


                      <?php } ?>
                    </select>



                    <!-- <input type="text" name="subjectname" class="form-control" required > -->
                   </div>

                   <button class="btn btn-danger m-auto d-block" type="submit" > Next ->  </button>
               </form>
           </div>
       </div>


  </div>
  <br>
  <form  action="bookadd(1).php" method="post" >
       <button class="btn btn-danger m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
