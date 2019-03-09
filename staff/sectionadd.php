
<!DOCTYPE html>
<html>
<head>
     <title> My library  </title>
      <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
  <div class="container m-auto ">
      <div class="text-center text-danger"><h1><br> Welcome to My library  <br></h1></div>
      <br>
      <br>
      <div class="row">

          <div class="col-lg-6 card m-auto">
            <h2 class="card-header text-center">  Section Addition </h2>
            <div class="card-body">
               <form  action="section_filling.php" method="post">
                   <div class="form-group">
                     <label>
                       Demartment Name
                     </label>
                     <input type="text" name="department" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Incharge Name
                     </label>
                     <input type="text" name="incharge" class="form-control" required >
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
