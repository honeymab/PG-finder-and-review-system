<?php include ('server.php');

if(empty($_SESSION['uname'])){
  header('location: login.php');
}
?>
<?php
	$uname=$_SESSION['uname'];
	$query= "SELECT * FROM review where owner='$uname'";
	$result= searchTable($query);
	function searchTable($query){
		$db=mysqli_connect("localhost","root","","pg");
		$searchResult=mysqli_query($db, $query);
		if (!$searchResult ) {
    		printf("Error: %s\n", mysqli_error($db));
    		exit();
		}
		return $searchResult;
	}

	
?>
<html>
<head>
  <?php include "header.php"; ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.12.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
  <meta name="description" content="">
  <title>Rate & Review</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="style1.css">




</head>
<body>
<section class="mbr-section" id="testimonials4-p" style="background-color: rgb(144, 168, 120); padding-top: 120px; padding-bottom: 120px;">



        <div class="mbr-section mbr-section__container mbr-section__container--middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-xs-center">
											<div class="btn-black"><a href="owner.php">Back to Home Page</a></div>
                        <h3 class="mbr-section-title display-2">Reviews of Students</h3>

                    </div>
                </div>
            </div>
        </div>


    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">
				<?php while($row= mysqli_fetch_array($result)): ?>
					<div class="mbr-testimonial card">
                        <div class="card-block"><p><?php echo $row['review']; ?></p></div>

                            <div class="mbr-author-name"><?php echo $row['postedby']; ?></div>
														  <div class="mbr-author card-footer">For <?php echo $row['name']?>
                        </div>
                    </div>
					<?php endwhile; ?>
                </div>

            </div>

        </div>
    </div>
</section>



<div class="btn-black"><a href="owner.php">Back to Home Page</a></div>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>



  </body>
</html>
