<!DOCTYPE html>
<html>
<head>
  <title>
    Student login
  </title>
  <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>

        <div class="container m-auto ">
            <div class="text-center text-primary"><h1><br> Welcome to My library  <br></h1></div>
            <br>
            <br>
            <div class="row">

                <div class="col-lg-6 card m-auto">
                  <h2 class="card-header text-center">  Student Login  </h2>
                  <div class="card-body">
                     <form  action="studentvalidation.php" method="post">
                         <div class="form-group">
                           <label>
                             Username
                           </label>
                           <input type="text" name="username" class="form-control" required >
                         </div>
                         <div class="form-group">
                           <label>
                             password
                           </label>
                           <input type="password" name="password" class="form-control" required >
                         </div>
                         <button class="btn btn-primary m-auto d-block" type="submit" > login </button>
                     </form>
                 </div>
             </div>

        </div>
        <div class="text-center">
          ARE YOU NEW  <a  class=" text-primary" href="registration.php">CREATE ACCOUNT</a>
        </div>
      </div>
  </body>
