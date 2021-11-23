<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "crud_db");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>PRODUCTS</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
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
		<div class="container">
			<br />
			<br />
			<br />
			<?php
				$query = "SELECT * FROM products ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="../images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
						<th><a href="../logic/buy.php">+Buy Now</a></th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="products.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<style>
.window {
	position: center;
	display: flex;
	justify-content: space-between;
	width: 95%;
	left: 5%;
	height: 20%;
	}  
.window>img {
	  margin: 20px;
	  width: 130px;
	  height: 130px;
	  border-radius: 100px;
	  border: 1px solid black;
	  }
	  
ul {
	  display: flex;
	  list-style-type: none;
	  flex-wrap: nowrap;
	}
	  
.windowList li {
	  transition: 0.5s ease;
	  margin: 0px 4px;
	  height: 45px ;
	  width: 140px;
	  text-align: center;
	  padding-top: 10px;
	  color: white;
	  background-image: linear-gradient(45deg, #a94442,  #a94442);
	  border-radius: 10px;
	  border: 1px solid rgb(255, 255, 255);
	  }
	  
ul li:hover {
	  height: 45px;
	  width: 140px;
	  padding-top: 20px;
	  transition: 0.5s ease;
	  }
.window ul li a{
		color: rgb(246, 246, 246);
		font-family:'Times New Roman', Times, serif;
		font-weight: bold;
	  }
.floating-text {
		background-color: #a94442;
		border: 1px solid rgb(0, 0, 0);
		border-radius: 10px 10px 0 0;
		color: #fff;
		font-family: 'Georgia';
		font-weight:500;
		font-size: 20px;
		padding: 7px 15px;
		position: fixed;
		bottom: 0;
		left: 50%;
		transform: translateX(-50%);
		text-align: center;
		}
.floating-text a {
		color: rgb(255, 238, 5);
		text-decoration: none;
		}
  </style>
	<br />

	<?php  include '../comp/footer.php'; ?>
