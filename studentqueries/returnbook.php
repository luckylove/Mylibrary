
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
            <h2 class="card-header text-center">  Return Book  </h2>
            <div class="card-body">
               <form  action="returnbookresult.php" method="post">
                   <div class="form-group">
                     <label>
                       Username
                     </label>
                     <input type="text" name="username" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Book NO.
                     </label>
                     <input type="text" name="bookno" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Copy Id.
                     </label>
                     <input type="text" name="copyid" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Issue Id
                     </label>
                     <input type="text" name="issueid" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Return In Damaged Condition
                     </label>
                     <br>
                      <input type="radio" name="isdamaged"  value="1" required >  YES
                      <br>
                      <input type="radio" name="isdamaged"  value="0" required > NO
                   </div>

                   <button class="btn btn-primary m-auto d-block" type="submit" > Return Book </button>
               </form>
           </div>
       </div>


  </div>
  <br>
  <br>
  <form  action="\mylibrary\studenthome.php" method="post" >
       <button class="btn btn-primary m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br> <br>
   <br>
   <br>

</div>
</body>
