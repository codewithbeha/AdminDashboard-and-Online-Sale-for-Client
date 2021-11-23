<?php
	session_start();
    include 'dbConfig.php' ; 

	$update=false;
	$id="";
	$username="";
	$email="";
	$user_type="";
	$password="";

	if(isset($_POST['add'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$user_type=$_POST['user_type'];
		$password = md5($password_1);
		$password_1=$_POST['password'];

		$query="INSERT INTO user_(username,email,user_type,password)VALUES(?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssss",$username,$email,$user_type,$password);
		$stmt->execute();

		header('location:../admin/userList.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$query="DELETE FROM user_ WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:../admin/userList.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM user_ WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$username=$row['username'];
		$email=$row['email'];
		$user_type=$row['user_type'];
		$password=$row['password'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$user_type=$_POST['user_type'];
		$password=$_POST['password'];

		$query="UPDATE user_ SET username=?,email=?,user_type=?,password=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssi",$username,$email,$user_type,$password,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:../admin/userList.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM user_ WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['id'];
		$vusername=$row['username'];
		$vemail=$row['email'];
		$vuser_type=$row['user_type'];
		$vpassword=$row['password'];
	}
?>