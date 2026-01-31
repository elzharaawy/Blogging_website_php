<?php
session_start(); // Start the session

require 'config/constants.php'; // Include your constants
require 'config/database.php'; // Include your database connection

$page_title = "404 - Page Not Found";
$meta_description = "The page you are looking for does not exist.";
$meta_keywords = "404, page not found, error";

include 'partials/header.php';
?>
<!-- error page 404 -->
  

<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<div class="text-center ">404</div>
		
		
		</div>
		
		<div class="contant_box_404">
		<div class="looklike">
		Look like you're lost
    </div>
		
		<p class="thepage">the page you are looking for not avaible!</p>
		
		<a href="http://localhost/blogwebsite/" class="link_404">Go to Home</a>
	  </div>
		</div>
		</div>
		</div>
	</div>

</section>

<?php 
include 'partials/footer.php';
?>