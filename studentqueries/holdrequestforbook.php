<?php
session_start();
//header('location:select.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
  //echo" connection is successuful   pp";
}
else{
  echo" no connection";
}
mysqli_select_db($con,$database) or die( "Unable to select database");

// we need to search the book whether it is their or not

$username = $_SESSION['username'];

// now we need to search the book form the system
// we can search the book by using either the $bookno
// or the title
// or the Author


// we need to search the book for the where is reserved si something is set or not set accordingly for it

// means we need to search all the books and tell user

// whether the book is allowed for the checkout or whether it is the reserved books


// we means we need to give both the things for the book
// and let the user to decide soemthing something

if($_POST['bookno'] != null)  {
            	$bookno = $_POST['bookno'];
            	// store session data
            	//Our SQL Query
            	$query1 = "Select B.bookno,title,author,edition,publisher,publisherplace,subjectname,COUNT(copyid) as copynum From book AS B, bookcopyinfo AS BC Where B.bookno = '$bookno' AND BC.bookno = B.bookno  AND reserved=0 AND ishold=0 AND isdamaged=0 AND ischecked=0";
            	//Run our sql query
              $result1 = mysqli_query ($con, $query1)  or die(mysqli_error($con));
            	if($result1 == false)
            	{
            		echo 'The query by bookno failed.';
            		exit();
            	}

                // result1 will stores the result of the queries for the non reserved books and and result2 shows the result for the reserved book it shows whether the book is available to read in the
                // library itself or not

              $query2 = "Select B.bookno,title,author,edition,publisher,publisherplace,subjectname,COUNT(copyid) as copynum From book AS B, bookcopyinfo AS BC Where B.bookno = '$bookno' AND BC.bookno = B.bookno  AND reserved=1 AND ishold=0 AND isdamaged=0 AND ischecked=0";
            	//Run our sql query
              $result2 = mysqli_query ($con, $query2)  or die(mysqli_error($con));
            	if($result2 == false)
            	{
            		echo 'The query by bookno failed.';
            		exit();
            	}

          }
elseif ($_POST['title'] != null)
              {
                $title = $_POST['title'];
              	// store session data
              	//Our SQL Query
              	$query1 = "Select B.bookno,title,author,edition,publisher,publisherplace,subjectname,COUNT(copyid) as copynum From book AS B, bookcopyinfo AS BC Where B.title = '$title' AND BC.bookno = B.bookno  AND reserved=0 AND ishold=0 AND isdamaged=0 AND ischecked=0";
              	//Run our sql query
                $result1 = mysqli_query ($con, $query1)  or die(mysqli_error($con));
              	if($result1 == false)
              	{
              		echo 'The query by bookno failed.';
              		exit();
              	}

                  // result1 will stores the result of the queries for the non reserved books and and result2 shows the result for the reserved book it shows whether the book is available to read in the
                  // library itself or not

                $query2 = "Select B.bookno,title,author,edition,publisher,publisherplace,subjectname,COUNT(copyid) as copynum From book AS B, bookcopyinfo AS BC Where B.title = '$title'AND BC.bookno = B.bookno  AND reserved=1 AND ishold=0 AND isdamaged=0 AND ischecked=0";
              	//Run our sql query
                $result2 = mysqli_query ($con, $query2)  or die(mysqli_error($con));
              	if($result2 == false)
              	{
              		echo 'The query by bookno failed.';
              		exit();
              	}
              }
elseif ($_POST['author'] != null)
               {
              	$author = $_POST['author'];
              	// store session data
              	//Our SQL Query
              	$query1 = "Select B.bookno,title,author,edition,publisher,publisherplace,subjectname,COUNT(copyid) as copynum From book AS B, bookcopyinfo AS BC Where B.author = '$author' AND BC.bookno = B.bookno  AND reserved=0 AND ishold=0 AND isdamaged=0 AND ischecked=0";
              	//Run our sql query
                $result1 = mysqli_query ($con, $query1)  or die(mysqli_error($con));
              	if($result1 == false)
              	{
              		echo 'The query by bookno failed.';
              		exit();
              	}

                  // result1 will stores the result of the queries for the non reserved books and and result2 shows the result for the reserved book it shows whether the book is available to read in the
                  // library itself or not

                $query2 = "Select B.bookno,title,author,edition,publisher,publisherplace,subjectname,COUNT(copyid) as copynum From book AS B, bookcopyinfo AS BC Where  B.author = '$author' AND BC.bookno = B.bookno AND reserved=1 AND ishold=0 AND isdamaged=0 AND ischecked=0";
              	//Run our sql query
                $result2 = mysqli_query ($con, $query2)  or die(mysqli_error($con));
              	if($result2 == false)
              	{
              		echo 'The query by bookno failed.';
              		exit();
              	}
              }
else
{
  // redirect it to again the booksearch.php
	header('Location: booksearch.php');
}
?>





<html>
<head>
     <title> My library  </title>
      <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
  <div class="container m-auto ">
      <div class="text-center text-primary"><h1><br> Welcome to My library  <br></h1></div>
      <br>
      <div class="row">
          <div class="col-lg-12 card m-auto">
            <h2 class="card-header text-center">  Search Book Result  </h2>
            <div class="card-body">
               <form  action="issuebook.php" method="post">
                   <div class="form-group">
                       <table class="table table-striped table-bordered">
                               <thead>
                                 <tr>
                                   <th>Select </th>
                                   <th>Book No</th>
                                   <th>Title</th>
                                   <th>Author </th>
                                   <th>Edition</th>
                                   <th>Publisher</th>
                                   <th>Publisher Place</th>
                                   <th>Subject Name </th>
                                   <th>Copies Available</th>
                                 </tr>
                               </thead>
                               <tbody>

                             <?php  while($row = mysqli_fetch_array($result1)){

                               	$bookno = $row['bookno'];
                               	$title = $row['title'];
                               	$edition = $row['edition'];
                                $author = $row['author'];
                                $publisher = $row['publisher'];
                                $publisherplace = $row['publisherplace'];
                                $subjectname = $row['subjectname'];
                               	$copynum = $row['copynum'];

                                // make the session variable for the furthur use to check whether we get some copies or not
                                  $_SESSION['copynum']=$copynum;
                                 ?>
                                 <tr>
                                   <td><input type="radio" name="bookno" value="<?php echo $bookno; ?>" required></td>
                                   <td><?php echo $bookno; ?></td>
                                   <td><?php echo $title; ?></td>
                                   <td><?php echo $author; ?></td>
                                   <td><?php echo $edition; ?></td>
                                   <td><?php echo $publisher; ?></td>
                                   <td><?php echo $publisherplace; ?></td>
                                   <td><?php echo $subjectname; ?></td>
                                   <td><?php echo $copynum; ?></td>
                                 </tr>
                               <?php
                               }
                               ?>

                               </tbody>
                             </table>
                   </div>
                   <br>
                  <button class="btn btn-primary m-auto d-block" type="submit" > ISSUE BOOK  </button>
               </form>
           </div>
       </div>


  </div>
  <div class="row">
      <div class="col-lg-12 card m-auto">
        <h2 class="card-header text-center">  BOOKS Available only to read in library   </h2>
        <div class="card-body">
                   <table class="table table-striped table-bordered">
                           <thead>
                             <tr>
                               <th>Book No</th>
                               <th>Title</th>
                               <th>Author </th>
                               <th>Edition</th>
                               <th>Publisher</th>
                               <th>Publisher Place</th>
                               <th>Subject Name </th>
                               <th>Copies Available</th>
                             </tr>
                           </thead>
                           <tbody>

                         <?php  while($row = mysqli_fetch_array($result2)){

                            $bookno = $row['bookno'];
                            $title = $row['title'];
                            $edition = $row['edition'];
                            $author = $row['author'];
                            $publisher = $row['publisher'];
                            $publisherplace = $row['publisherplace'];
                            $subjectname = $row['subjectname'];
                            $copynum = $row['copynum'];
                             ?>
                             <tr>
                               <td><?php echo $bookno; ?></td>
                               <td><?php echo $title; ?></td>
                               <td><?php echo $author; ?></td>
                               <td><?php echo $edition; ?></td>
                               <td><?php echo $publisher; ?></td>
                               <td><?php echo $publisherplace; ?></td>
                               <td><?php echo $subjectname; ?></td>
                               <td><?php echo $copynum; ?></td>
                             </tr>
                           <?php
                           }
                           ?>

                           </tbody>
                         </table>
               </div>

       </div>
   </div>
<br>
<form  action="booksearch.php" method="post" >
     <button class="btn btn-primary m-auto d-block" type="submit" > <- Go back And Search Some Other Book </button>
</form>
<br>
<br>
<br>
<br>

</div>
</body>
</html>
