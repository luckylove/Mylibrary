
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
            <h2 class="card-header text-center">  BOOK CHECKOUT  </h2>
            <div class="card-body">
               <form  action="checkout_check.php" method="post">
                   <div class="form-group">
                     <label>
                    Book Number
                     </label>
                     <input type="text" name="bookno" class="form-control" required   >
                   </div>

                   <div class="form-group">
                     <label>
                    Enter The Issue Id
                     </label>
                     <input type="text" name="issueid" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                    Enter The Copy Id
                     </label>
                     <input type="text" name="copyid" class="form-control" required  >
                   </div>

                   <button class="btn btn-primary m-auto d-block" type="submit" > Checkout  Book </button>
               </form>
           </div>
       </div>


  </div>
  <br>
  <form  action="\mylibrary\studenthome.php" method="post" >
       <button class="btn btn-primary m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
