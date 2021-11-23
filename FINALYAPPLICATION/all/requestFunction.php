<?php
	session_start();
    include 'dbConfig.php' ; 

	$update=false;
	$id="";
	$username="";
	$email="";
	$message="";

	if(isset($_POST['add'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		

		$query="INSERT INTO contact(username,email,message)VALUES(?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sss",$username,$email,$message);
		$stmt->execute();

		header('location:../admin/request.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$query="DELETE FROM contact WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:../admin/request.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM contact WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$username=$row['username'];
		$email=$row['email'];
		$message=$row['message'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$message=$_POST['message'];

		$query="UPDATE contact SET username=?,email=?,message=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssi",$username,$email,$message,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:../admin/request.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM contact WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vusername=$row['username'];
		$vemail=$row['email'];
		$vmessage=$row['email'];
	}
?>