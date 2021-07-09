<?php
// if(!isset($_SESSION['custID'])){
session_start();
// }
include('includes/connection.php');
if (isset($_SESSION['custId'])) {
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <title>Customer Login</title>
  <link rel="stylesheet" href="styles/login.css">
</head>

<body>
  <div class="bg">
    <br />
    <p class="container h1">Pizzeria Login</p>
    <br /><br />
    <div class="container">
      <div class="form-group">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="log"><label for="emailid">Email ID:</label></div>
          <input type="email" name="email" placeholder="Enter Your Email eg.Rachel_green@CentralPerk.com" id="emailid" name="emailid" required>
          <pr><br><br></pr>
          <div class="log"><label for="pwd">Password:</label></div>
          <input type="password" name="password" placeholder="**********" id="pwd" name="pwd" required>
          <pr><br><br></pr>
          <div><button class="btn btn-success" name="login" type="submit">Login</button>
          </div>
        </form>
      </div>
      <br><br>
      <div class="text-success">
        Don't have an account ? &emsp;
        <a href="/LAMPAssignment/customer/register.php" class="btn btn-light">Register here</a>
      </div>
      <br />
      <a href="/LAMPAssignment" class="text-warning">Return to Home</a>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pwd = $_POST['password'];
  $sql = "SELECT * FROM customer where email_id='$email' and pwd='$pwd'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    $result = mysqli_fetch_assoc($result);
    $_SESSION['custId'] = $result['cust_id'];
    $_SESSION['name'] = $result['name'];
    $_SESSION['email_id'] = $result['email_id'];
    $_SESSION['phoneno'] = $result['phoneno'];
    // echo "<script>alert('Success!');</script>";
    echo "<script>window.location='index.php'</script>";
  } else {
    echo "<script>alert('Invalid Credentials!');</script>";
    session_unset();
    session_destroy();
  }
}
?>