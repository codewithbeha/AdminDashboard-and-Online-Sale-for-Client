<?php 
	include ('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
   //buttoni i logout
    if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/stylee.css">
</head>
<body>
<br>
<div class="window">
    <img id="logo" class="windowPhoto" src="../img1/beharabdyli.jpg" alt="Behar Abdyli Logo">
    <ul class="windowList">
      <li> <a class="nav-link-wrapper" href="login.php">Login</a></li>
      <li> <a class="nav-link-wrapper" href="index.php">Home</a></li>
      <li> <a class="nav-link-wrapper" href="products.php">Products</a></li>
      <li> <a class="nav-link-wrapper" href="imdb.php">IMDb</a></li>
      <li> <a class="nav-link-wrapper" href="contact.php">Contact US</a></li>
    </ul>
  </div>

<div></div>
	<div class="header">
		<h2>Home Page</h2>
    <h3 style="color:#41fc03;"> | > Welcome new Member < |</h3>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../admin/img/user.jpg"  >
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">》》Logout ⋆ 》》</a>
					</small>
					<?php endif ?>
			</div>
		</div>
	</div>
  <br><br>
<div class="slideshow-container">
  <!-- Full-width images with number and caption text -->

  <div class="mySlides fade">
    <div class="numbertext"style="color: white; font-weight: bold;">1 / 5</div>
    <img src="../images/101.jpg" style="width:100%">
    <div class="text" style="color: #20fc03; font-weight: bold;">4.800.000$</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext" style="color: white; font-weight: bold;">2 / 5</div>
    <img src="../images/116.jpg" style="width:100%">
    <div class="text" style="color: #20fc03; font-weight: bold;">4.500.000$</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext" style="color: black; font-weight: bold;">3 / 5</div>
    <img src="../images/115.jpg" style="width:100%">
    <div class="text" style="color: #20fc03; font-weight: bold;">3.400.000$</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext" style="color: white; font-weight: bold;">4 / 5</div>
    <img src="../images/112.png" style="width:100%">
    <div class="text" style="color: #20fc03; font-weight: bold;">2.600.000$</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext" style="color: white; font-weight: bold;">5 / 5</div>
    <img src="../images/113.jpg" style="width:100%">
    <div class="text" style="color: #20fc03; font-weight: bold;">2.000.000$</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>
</div>

<style>
   .open{
    margin: 0 auto;
    position: center;
    text-align: center;
    align-items: center;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

</style>
<script >
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

	<?php include ('../comp/footer.php');  ?>