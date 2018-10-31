 <?php session_start() ?>
<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Elements - Transit by TEMPLATED</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
        <script src="map.js"></script>
        
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
        
        <style>
            #map{
                height:500px;
                width:80%;
                margin-left: 100px;
                margin-right: 100px;
             }
            #fetch{
                display: none;
            }
        </style>
        
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">DeeMECHS</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="about_us.html">About us</a></li>
						<li><a href="sign_up.html" class="button special">Sign Up</a></li>
					</ul>
				</nav>
			</header>
        
        
        <div id = 'user'>
            <centre><h1>Welcome <?php echo $_SESSION['name']; ?></h1></centre>
            <div id='fetch'>
            <?php
                require 'configure.php';
                $q="Select * from garages where lat is null and lng is null";
                $result = mysqli_query($conf,$q);
                $row = mysqli_fetch_all($result,MYSQLI_BOTH);
                $row = json_encode($row,true);
                echo "<div id='data'>".$row."</div>";
                
                $q2="Select * from garages";
                $result2 = mysqli_query($conf,$q2);
                $row2 = mysqli_fetch_all($result2,MYSQLI_BOTH);
                $row2 = json_encode($row2,true);
                echo "<div id='allData'>".$row2."</div>";
                
            ?>
            </div>
        </div>
        
       <div id = 'map'></div>
  
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrujgPDyxE5nHKBnrerp6X7KcOgxgIGxc&callback=initMap"
        async defer></script>
          <!-- Footer -->
			<footer id="footer">
				<div class="container">
					
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>        
