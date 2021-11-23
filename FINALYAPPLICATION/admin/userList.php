<?php
  include '../all/functionList.php' 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="BEHAR ABDYLI">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>USER List⋆</title>
  <!-- Stilizim ekstra -->
  <link rel="stylesheet" href="../css/style1.css">
  <!-- STILIZIM I GATSHEM FROM BOOTSTRAP -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!--LIBRARITE jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- SCRIPTE E GATSHME JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!--SCRIPT E GATSHME NE JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
</head>

<body>
<div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">REGISTER/UPDATE A MEMBER</h3>
        <form action="../all/functionList.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <input type="text" name="username" value="<?= $username; ?>" class="form-control" placeholder="Enter name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Enter e-mail" required>
          </div>
          <div class="input-group">
			    <label>User type ★</label>
          <div class="input-group">
		    	<select name="user_type" id="user_type" value="<?= $user_type; ?>" class="form-control" placeholder="Enter Type" required>
				  <option value=""></option>
				  <option value="admin">Admin</option>
				  <option value="user">User</option>
			</select>
      </div>
      <div class="form-group">
            <input type="password" name="password" value="<?= $password; ?>" class="form-control" placeholder="Enter Password" required>
      </div>
		</div>
          <div class="form-group">
            <?php if ($update == true) { ?>
            <input type="submit" name="update" class="btn btn-success btn-block" value="UPDATE USER">
            <?php } else { ?>
            <input type="submit" name="add" class="btn btn-primary btn-block" value="REGISTER USER">
            <?php } ?>
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <?php
          $query = 'SELECT * FROM user_';
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>
        <br>
        <h3 class="text-center text-info">MEMBERS LIST</h3>
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>UserType</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><?= $row['username']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['user_type']; ?></td>
              <td><?= $row['password']; ?></td>
              <td>
          <a href="../all/detailsList.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
          <a href="../all/functionList.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
          <a href="userList.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
  <style>
  form, .content {
	width: 100%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
  </style>
<div></div>
<?php  include '../comp/footer.php';   ?>