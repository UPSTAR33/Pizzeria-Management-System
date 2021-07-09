<?php
include('includes/loginCheck.php');
include('includes/connection.php');
if (isset($_POST['addAdmin'])) {
  $name = $_POST['name'];
  $email_id = $_POST['email'];
  $pwd = $_POST['pwd'];
  $sql = "INSERT INTO admin(name,emailid,pwd) VALUES ('$name','$email_id','$pwd')";
  $result = mysqli_query($con, $sql);
  if (mysqli_error($con)) {
    $err = "Not Added " . mysqli_error($con);
    echo "<script>alert('$err');</script>";
  } else {
    echo "<script>alert('Admin Added');</script>";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <title>Add Admin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Admin</title>
  <link rel="stylesheet" href="styles/addAdmin.css">
</head>

<body class="bg">
  <?php include('topMenu.php') ?>
  <div class="container">
    <br>
    <br>
    <h1 class="h1">Add Admin</h1>
  </div>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="container">
    <div class="form-group">
      <label for="name">Name</label><br>
      <input type="text" name="name" id="name" required><br>
    </div>
    <div class="form-group">
      <label for="name">Email ID</label><br>
      <input type="email" name="email" id="email" required><br>
    </div>
    <div class="form-group">
      <label for="pwd">Password</label><br>
      <input type="password" name="pwd" id="pwd" required><br><br>
    </div>
    <button class="btn btn-dark" name="addAdmin" type="submit">Add</button><br>
  </form>
</body>

</html>