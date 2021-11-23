<?php
	session_start();
    include 'dbConfig.php' ; 

	$update=false;
	$id="";
	$image="";
	$name="";
    $prince="";

	if(isset($_POST['add'])){
	    $image=$_POST['image'];
		$name=$_POST['name'];
		$price=$_POST['price'];

		$image=$_FILES['image']['name'];
		$upload="../images/".$image;

		$query="INSERT INTO products(name,price,image)VALUES(?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssss",$name,$price,$image,$upload);
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $upload);

		header('location:../admin/products.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";
	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT photo FROM products WHERE id=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['photo'];
		unlink($imagepath);

		$query="DELETE FROM products WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:../admin/products.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM products WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['id'];
		$image=$row['image'];
		$name=$row['name'];
		$price=$row['price'];
		

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$image=$_POST['image'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="../images/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE products SET name=?,image=?,price=?,photo=? WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssi",$name,$price,$newimage,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:../admin/products.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM products WHERE id=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();
        
		$vid=$row['id'];
		$vimage=$row['image'];
		$vname=$row['name'];
		$vprice=$row['price'];
	}
?>