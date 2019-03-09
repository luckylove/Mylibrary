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
            <h2 class="card-header text-center">  Faculty Profile Details  </h2>
            <div class="card-body">
               <form  action="facultyprofile_filling.php" method="post">
                   <div class="form-group">
                     <label>
                       Name
                     </label>
                     <input type="text" name="facultyname" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Registration no.
                     </label>
                     <input type="text" name="regno" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       DOB
                     </label>
                     <input type="date" name="dob" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Email
                     </label>
                     <input type="text" name="email" class="form-control" required >
                   </div>
                   <div class="form-group">
                     <label>
                       Department
                     </label>
                     <input type="text" name="department" class="form-control" required >
                   </div>
                   <div class="form-group">
                     <label>
                       Address
                     </label>
                     <textarea name="address" class="form-control" required > </textarea>
                   </div>

                   <button class="btn btn-primary m-auto d-block" type="submit" > Submit </button>
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
