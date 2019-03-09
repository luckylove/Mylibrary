
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
            <h2 class="card-header text-center">  Student Profile Details  </h2>
            <div class="card-body">
               <form  action="studentprofile_filling.php" method="post">
                   <div class="form-group">
                     <label>
                       Name
                     </label>
                     <input type="text" name="studentname" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Roll no.
                     </label>
                     <input type="text" name="rollno" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Branch
                     </label>
                     <input type="text" name="branch" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       year
                     </label>
                     <input type="text" name="year" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Batch
                     </label>
                     <input type="text" name="batch" class="form-control" required >
                   </div>
                   <div class="form-group">
                     <label>
                       Email
                     </label>
                     <input type="text" name="email" class="form-control" required >
                   </div>
                   <div class="form-group">
                     <label>
                      DOB
                     </label>
                     <input type="date" name="dob" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Gender
                     </label>
                     <br>
                      <input type="radio" name="gender"  value="male" required >  male
                      <br>
                      <input type="radio" name="gender"  value="female" required > female
                   </div>
                   <div class="form-group">
                     <label>
                       Age
                     </label>
                     <input type="text" name="age" class="form-control" required >
                   </div>
                   <div class="form-group">
                     <label>
                       Hostel
                     </label>
                     <input type="text" name="hostel" class="form-control" required >
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
