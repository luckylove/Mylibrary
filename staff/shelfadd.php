<?php
session_start();
//header('location:staffportal.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
  //echo" connection is successuful   pp";
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
          width: 100%;
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
            <h2 class="card-header text-center">  Shelf Addition </h2>
            <div class="card-body">
               <form  action="shelf_filling.php" method="post">
                 <div class="form-group">
                   <label>
                     Shelf Id
                   </label>
                   <input type="text" name="shelfid" class="form-control" required >
                 </div>
                   <div class="form-group">
                     <label>
                       Section Name
                     </label>
                       <select name="sectionid" required>
                         <?php
                             $q=" select * from section ;";
                            $result = mysqli_query($con,$q);
                            while($row=mysqli_fetch_array($result)){
                                $value=$row['sectionid'];
                                $department=$row['department'];
                          ?>
                       <option class="text-center m-auto d-block"value="<?php echo $value ?> "> <?php echo $department ?> </option>
                     <?php } ?>
                       </select>
                   </div>

                   <button class="btn btn-danger m-auto d-block" type="submit" > Submit </button>
               </form>
           </div>
       </div>


  </div>
  <br>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
