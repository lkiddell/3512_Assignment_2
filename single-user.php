<?php 
session_start();
include_once "functions.php";
if ( !isset($_GET['id']))
{
			header("Location: error.php");
}
			
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>

     <!-- Google fonts used in this theme  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,800,600,700,300' rel='stylesheet' type='text/css'>  

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Assignment 1</title>
    
   

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3_travelTheme/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="bootstrap3_travelTheme/theme.css" rel="stylesheet">  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap3_travelTheme/assets/js/html5shiv.js"></script>
      <script src="bootstrap3_travelTheme/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php 
include "includes/travel-header.inc.php";
 ?>
 
   <div class="container">  <!-- start main content container -->
   <div class="row">  <!-- start main content row -->
  <div class="col-md-3">
   	<?php 
	include "includes/travel-left-rail.inc.php"; 
	
	$row = findUserRow();
	$name = $row['FirstName'] . " " . $row['LastName'];

	?>
   </div>
   
      <div class="col-md-9">  <!-- start main content column -->
         <ol class="breadcrumb">
           <li><a href="index.php">Home</a></li>
           <li><a href="browse.php">Browse</a></li>
           <li><a href="browse-users.php">Users</a></li>
           <li><a href='#' class='active'><?php echo $name; ?></a></li>
         </ol>  
         <div> <!-- User description-->
        <?php
        echo "<h1>". $name . "</h1>";
        echo "<p>Address: <strong>" . $row['Address'] . "</strong></p>";
        echo "<p>City, Country: <strong>" . $row['City'] . ", " . $row['Country'] . "</strong></p>";
        echo "<p>Email: <strong>" . $row['Email'] . "</strong></p>";
        ?>
        </div>
        
        <div class="panel panel-info">
           <div class="panel-heading">Images From <?php echo $name;?></div> 
           <div class="well">
            <div class="row">         
            <?php
             $row = findUserRowPics();
             if ($row->rowCount() == 0)
             {
             	echo "This user has no pictures yet!";
             }
             else
             {
             	images($row);
             }
             ?>
        	</div>
        	</div>
        </div>
  
      
      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php
include "includes/travel-footer.inc.php";
?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script> 
   
</body>
</html>
