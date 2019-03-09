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
            <h2 class="card-header text-center">  STAFF PORTAL  </h2>
            <div class="card-body">
              <br>

              <form  action="sectionadd.php" method="post">
                  <button class="btn btn-danger text-center m-auto d-block" type="submit" > ADD SECTION </button>
              </form>
                <br>
               <form  action="shelfadd.php" method="post">
                   <button class="btn btn-danger text-center m-auto d-block" type="submit" > ADD SHELF </button>
               </form>
                 <br>
                 <form  action="subjectadd.php" method="post">
                     <button class="btn btn-danger text-center m-auto d-block" type="submit" > ADD NEW SUBJECT  </button>
                 </form>
                 <br>
               <form  action="bookadd.php" method="post">
                   <button class="btn btn-danger text-center m-auto d-block" type="submit" > ADD BOOK  </button>
               </form>

                 <br>  <br>
           </div>
         </div>

     </div>
     <br>  <br><br>  <br><br>  <br>
   </div>
 </body>
