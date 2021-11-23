<?php
  include '../logic/action.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="BEHAR ABDYLI">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IMDb</title>
  <!-- Stilizim ekstra -->
  <link rel="stylesheet" href="../css/style.css">
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
  <br><br><br>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">REGISTER A ACTOR</h3>
        <form action="../logic/action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Enter name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Enter e-mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" value="<?= $phone; ?>" class="form-control" placeholder="Enter phone" required>
          </div>
          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $photo; ?>">
            <input type="file" name="image" class="custom-file">
            <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
          </div>
          <div class="form-group">
            <?php if ($update == true) { ?>
            <input type="submit" name="update" class="btn btn-success btn-block" value="Update Actor">
            <?php } else { ?>
            <input type="submit" name="add" class="btn btn-primary btn-block" value="REGISTER ACTOR">
            <?php } ?>
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <?php
          $query = 'SELECT * FROM crud';
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>
        <h3 class="text-center text-info">LIST OF YOUR ACTOR REGISTER</h3>
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><img src="<?= $row['photo']; ?>" width="25"></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['phone']; ?></td>
              <td>
                <a href="../logic/details.php?details=<?= $row['id']; ?>" class="badge badge-primary p-2">Details</a> |
                <a href="../logic/action.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                <a href="imdbList.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a>
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
<br>
<br>
<br>

<div class="floating-text">
	 All right reserved <a href="" target="_blank"> © BeharAbdyli </a> Design
</div>
<br>
<br>
</body>
</html>
