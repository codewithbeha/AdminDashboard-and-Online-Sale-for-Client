<?php 
try{
  $db = new mysqli("localhost", "root", "", "crud_db");
} catch(Exception $exc){
  echo $exc->getTraceAsString();
}


if(isset($_POST['name']) && isset($_POST['card']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['productname']) && isset($_POST['price'])){
$name = $_POST['name'];
$card = $_POST['card'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$productname = $_POST['productname'];
$price = $_POST['price'];


$is_insert = $db->query("INSERT INTO `buy`(`name`, `card` , `email`, `phone` , `address`, `productname` , `price`) VALUES ('$name', '$card' ,'$email', '$phone' ,'$address', '$productname' , '$price')");

if($is_insert == TRUE){
  echo "<h2>Your order has been successfully completed ...
            As soon as we confirm the order we will contact you, Thank you</h2>";
  exit();
}

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	    <link href="style.css" rel="stylesheet" type="text/css">
	    <link href="img\buy.png" rel="icon">
	    <title>Buy Now</title>
</head>
    </head>
    <body>
    <div id="error"></div>
    <div class="forma">
    <h1>Buy Now</h1> <br><br>
<form id="form" method="Post" action="" >
   <input id="name" type="text" name="name" placeholder="Full Name" required><br><br>
   <input id="card" onclick="return myfun1()" type="card" name="card" placeholder="XXXX/XXXX/XXXX/XXXX"> <span id="err"></span> <br><br>
   <input id="email" type="email" name="email" placeholder="@gmail.com" required><br><br>
   <input id="phone" type="phone" name="phone" placeholder="+38344787787"><br><br>
   <input id="address" type="address" name="address" placeholder="Address"><br><br>
   <input id="productname" type="productname" name="productname" placeholder="Correct Product Name" ><br><br>
   <input id="price" type="price" name="price" placeholder="Product Price" ><br><br>
   <button id="submit" type="submit">Submit</button>
 </form>
 </div>
 <br> <br>
 <div class="floating-text">
	 All right reserved <a href="" target="_blank"> © BeharAbdyli </a> Design
</div>

  <script>

function myfun1(){
	var a = document.getElementById("card").value;
	
    if(a==""){
        document.getElementById("err").innerHTML="**Please fill the Card Number";
        return false;
    }
    if(a.length < 16 ){
        document.getElementById("err").innerHTML="**Card number length cannot be below 16 characters";
        return false;
    }
    if(a.length > 16 ){
        document.getElementById("err").innerHTML="**Card number length cannot be upper 16 characters";
        return false;
    }
    if(a.length == 16 ){
        document.getElementById("err").innerHTML="**Card number length is 16 characters, is correct";
        return true;
    }
   }
  </script>

<style>

<style>

* {
    margin: 0px;
    padding: 0px;
}
body {
    font-size: 120%;
    background: #00002a;
}

.header {
  position: center;
  display: flex;
  justify-content: space-between;
  width: 90%;
  left: 5%;
  height: 20%;
  flex-wrap: wrap;
}

.header>img {
  width: 400px;
  height: 100px;
  border-radius: 50%;
}

ul {
  display: flex;
  list-style-type: none;
  flex-wrap: nowrap;
}

.headerList li {
  transition: 0.5s ease;
  margin: 0px 4px;
  height: 30px;
  width: 100px;
  text-align: center;
  padding-top: 10px;
  color: white;
  background-image: linear-gradient(45deg, #302c2b, #328ca8);
  border-radius: 10px;
}

ul li:hover {
  height: 40px;
  width: 110px;
  padding-top: 20px;
  transition: 0.5s ease;
}
.header ul li a{
    color: rgb(255, 255, 255);
    font-family:bold;
}


@media only screen and (max-width:375px) {
  .header {
    flex-direction: column;
  }

  .header img {
    height: 50px;
    width: 50px;
    position: relative;
    left: 40%;
  }

  .headerList {
    padding: 0;
  }
}

@media only screen and (min-width:1366px) {} 

 <?php //Pjesa e css ne formen e contact us  ?>
 @import url('https://fonts.googleapis.com/css?family=Raleway');

.floating-text {
	background-color: #001F61;
	border-radius: 10px 10px 0 0;
	color: #fff;
	font-family: 'Muli';
	padding: 7px 15px;
	position: fixed;
	bottom: 0;
	left: 50%;
	transform: translateX(-50%);
	text-align: center;
	z-index: 998;
}

.floating-text a {
	color: gold;
	text-decoration: none;
}
.forma {
	width: 100%;
	height: 100%;
	flex-shrink: 0;
	padding: 44px 38px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	align-items: center;
	position: relative;
	right: 0;
    transition: right 0.2s;
    color: white;

}
.forma h1{
  border: 2px solid white;
  background: green;
}

.extend forma {
	right: 100%;
}

.inputs {
	width: 100%;
	padding-top: 6px;
}

.inputs input {
	position: relative;
	margin-bottom: 20px;
	width: 100%;
	display: flex;
	align-items: center;
}

.input input {
	width: 100%;
	font-size: 17px;
	background: #dcf3f7;
	border-radius: 8px;
	padding: 16px 18px 16px 51px;
	color: rgb(50, 50, 50);
}
#name{
    border: 3px solid green;
    font-size: 20px;
    font-family: Georgia;
    color: black;
    padding: 10px;
}
#card{
    border: 3px solid green;
    font-size: 20px;
    font-family: Georgia;
    color: black;
    padding: 10px;
}
#email{
    border: 3px solid green;
    font-size: 20px;
    font-family: Georgia;
    color: black;
    padding: 10px;
}
#phone{
    border: 3px solid green;
    font-size: 20px;
    font-family: Georgia;
    color: black;
    padding: 10px;
}
#address{
    border: 3px solid green;
    font-size: 20px;
    font-family: Georgia;
    color: black;
    padding: 10px;
}
#productname{
    border: 3px solid green;
    font-size: 20px;
    font-family: Georgia;
    color: black;
    padding: 10px;
}
#price{
    border: 3px solid green;
    font-size: 20px;
    font-family: Georgia;
    color: black;
    padding: 10px;
}
#submit{
	height: 50px;
	width: 150px;
	font-size: 18px;
	font-weight: 600;
	background: green;
	outline: none;
	cursor: pointer;
	border: 3px solid #020202;
	border-radius: 25px;
  transition: .4s;
  color: white;
  padding: 10px;
}
#err{
  color: red;
}
  
</style>

</body>
</html>