<!DOCTYPE html>
<html>
<head>
  <title>
    registration page
  </title>
  <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>

        <div class="container">
            <div class="text-center text-primary"><h1><br> Welcome to my library   <br></h1></div>
            <br>
            <br>
            <div class="row">

                <div class="col-lg-6 card m-auto">
                  <h2 class="card-header text-center" > Student Sign in </h2>
                    <div class="card-body">
                     <form  action="studentregistration.php" method="post">
                         <div class="form-group">
                           <label>
                             Username
                           </label>
                           <input type="text" name="username" class="form-control" required>
                         </div>
                         <div class="form-group">
                           <label>
                             password
                           </label>
                           <input type="password" name="password" class="form-control" required>
                         </div>
                         <div class="form-group">
                           <label>
                              Confirm Password
                           </label>
                           <input type="password" name="confirmpassword" class="form-control" required>
                         </div>
                         <button class="btn btn-primary m-auto d-block" type="submit" > signin </button>
                     </form>
                   </div>
                </div>
            </div>
        </div>
</body>
</html>
