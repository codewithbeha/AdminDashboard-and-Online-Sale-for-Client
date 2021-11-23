<?php
	session_start();
    include 'dbConfig.php' ; 

	$update=false;
	$id="";
	$name="";
    $card="";
	$email="";
    $phone="";
	$address="";
    $productname="";
    $price="";

	if(isset($_POST['add'])){
		$name=$_POST['name'];
        $card=$_POST['card'];
		$email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $productname=$_POST['productname'];
		$price=$_POST['price'];
		

		$query="INSERT INTO buy(name,card,email,phone,address,productname,price)VALUES(?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssss",$name,$card,$email,$phone,$address,$productname,$price);
		$stmt->execute();

		header('location:../admin/order.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$query="DELETE FROM buy WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:../admin/order.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM buy WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$name=$row['name'];
        $card=$row['card'];
		$email=$row['email'];
        $phone=$row['phone'];
        $address=$row['address'];
        $productname=$row['productname'];
		$price=$row['price'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
        $card=$_POST['card'];
		$email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $productname=$_POST['productname'];
		$price=$_POST['price'];

		$query="UPDATE buy SET name=?,card=?,email=?,phone=?,address=?,productname=?,price=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssss",$name,$card,$email,$phone,$address,$productname,$price);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:../admin/order.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM buy WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vname=$row['name'];
        $vcard=$row['card'];
		$vemail=$row['email'];
		$vphone=$row['phone'];
        $vaddress=$row['address'];
		$vproductname=$row['productname'];
		$vprice=$row['price'];
	}
?>