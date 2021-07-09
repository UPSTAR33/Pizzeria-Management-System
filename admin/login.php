<?php
session_start();
include('includes/connection.php');
if (isset($_SESSION['adminId'])) {
  header('Location:index.php');
}
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $sql = "SELECT * FROM `admin` where emailid='$email' and pwd='$pwd'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    $result = mysqli_fetch_assoc($result);
    $_SESSION['adminId'] = $result['admin_id'];
    $_SESSION['name'] = $result['name'];
    $_SESSION['emailid'] = $result['emailid'];
    echo "<script>window.location='index.php'</script>";
  } else {
    echo "<script>alert('Invalid Credentials!');</script>";
    session_unset();
    session_destroy();
  }
}
?>
<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <title>Admin Login</title>
  <link rel="stylesheet" href="styles/login.css">
</head>

<body>
  <div class="bg">
    <br>
    <p class="container h1">Pizzeria Admin Login</p>
    <br>
    <br>
    <div class="container">
      <div class="form-group">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="log"><label for="emailid">Email ID:</label></div>
          <input type="email" placeholder="Enter Your Email eg.Rachel_green@CentralPerk.com" id="emailid" name="email" required>
          <pr><br><br></pr>
          <div class="log"><label for="pwd">Password:</label></div>
          <input type="password" placeholder="**********" id="pwd" name="pwd" required>
          <pr><br><br></pr>
          <div>
            <button type="submit" name="login" class="btn btn-success">Login</button>
          </div>
          <br />
          <a href="/LAMPAssignment" class="text-warning">Return to Home</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>