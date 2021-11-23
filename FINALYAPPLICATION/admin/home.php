<?php 
include('../view/functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../view/login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../view/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/stylee.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
<br>

	<div class="header">
		<h2>⋆ Admin ⋆</h2>
		<h3 style="color:#9bb9eb;">⋆ Welcome in your Dashboard ⋆</h3>
	</div>
	<div class="content">
		<!-- errors info -->
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

		<!-- logged in user info -->
		<div class="profile_info">
			<img src="../admin/img/admin.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
                       &nbsp; <a href="create_user.php" style="color: blue;">》+Add User ⋆</a>&nbsp; 
					   <a href="userList.php" style="color: black;"> 》User List ⋆</a>&nbsp; 
					   <a href="request.php" style="color: brown;"> 》Request Feedback ⋆</a>&nbsp; 
					   <a href="products.php" style="color: red;"> 》Products ⋆</a>&nbsp;
					   <a href="imdbList.php" style="color: #c2a200;"> 》IMDb ⋆</a>&nbsp;
					   <a href="order.php" style="color: green;"> 》Order List ⋆</a>&nbsp;
					   <a href="try.php" style="color: #03c0ff;">》Try Products ⋆</a>&nbsp;
					   <a href="home.php?logout='1'" style="color: gray;"> 》Logout ⋆ 》</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
    <?php  include '../comp/footer.php'   ?>