<?php
if (!isset($_SESSION)) {
  session_start();
}
include('includes\connection.php');
if (isset($_SESSION['custId'])) {
  header('Location:index.php');
}
$name = "";
$nameErr = "";
$email = "";
$emailErr = "";
$phn = "";
$phnErr = "";
$valid = true;
$pwdErr = "";
if (isset($_POST['register'])) {
  $name = check_input($_POST['name']);
  $email = check_input($_POST['emailid']);
  $pwd = check_input($_POST['pwd']);
  $phn = check_input($_POST['phn']);
  if (empty($name)) {
    $nameErr = "Name is required";
    $valid = false;
  }
  if (empty($email)) {
    $emailErr = "Email is required";
    $valid = false;
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid Email";
    $valid = false;
  }

  if (empty($phn)) {
    $phnErr = "Phone No. is required";
    $valid = false;
  } else if (!preg_match("/^[0-9]*$/", $phn)) {
    $phnErr = "Only numeric digits are allowed";
    $valid = false;
  } else if (strlen($phn) != 10) {
    $phnErr = "Phone No. must be of exactly 10 digits";
    $valid = false;
  }
  if (empty($pwd)) {
    $pwdErr = "Password is required";
    $valid = false;
  }
  if ($valid) {
    $sql = "INSERT INTO customer (name, phoneno, email_id, pwd) VALUES ('$name', '$phn', '$email', '$pwd')";
    if (mysqli_query($con, $sql)) {
      echo "<script>alert('Registeration Successful');</script>";
      echo "<script>window.location='login.php'</script>";
    } else if (mysqli_error($con)) {
      $err = mysqli_error($con);
      if (stristr($err, "Duplicate") > 0) {
        if (stristr($err, "phoneno") > 0) {
          died('Registeration Failed! \nThe user with same phone number already exists');
        }
        if (stristr($err, "email") > 0) {
          died('Registeration Failed! \nThe user with same email id already exists');
        }
      } else died('Registeration Failed! \n' . $err);
      session_unset();
      session_destroy();
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <title>Customer Registration</title>
  <link rel="stylesheet" href="styles/register.css">
</head>

<body>
  <div class="bg">
    <br>
    <p class="h1 container">Pizzeria Registration</p>
    <br>
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="form-group">
          <label class="log" for="name">Name:</label>
          <?php echo "<span class='text-danger'> $nameErr </span>"; ?>
          <br>
          <input type="text" value="<?php echo $name; ?>" placeholder="Enter Name" name="name" />
        </div>
        <div class="form-group">
          <label class="log" for="phn">Phone no:</label>
          <?php echo "<span class='text-danger'> $phnErr </span>"; ?>
          <br>
          <input type="text" value="<?php echo $phn; ?>" placeholder="Enter Phone Number eg.7203017240" name="phn" />
        </div>
        <br>
        <div class="form-group">
          <label class="log" for="emailid">Email-ID:</label>
          <?php echo "<span class='text-danger'> $emailErr </span>"; ?>
          <br>
          <input type="email" value="<?php echo $email; ?>" placeholder="Enter Email eg.rachel_green@cetralperk.com" name="emailid" />
        </div>
        <div class="form-group">
          <label class="log" for="pwd">Password:</label>
          <?php echo "<span class='text-danger'> $pwdErr </span>"; ?>
          <br>
          <input type="password" placeholder="**************" name="pwd" />
        </div>
        <div class="form-group">
          <button type="submit" name="register" class="btn btn-success">Register</button>
        </div>
      </form>
      <div class="text-success">
        Already have an account ? &nbsp;&nbsp;
        <a href="/LAMPAssignment/customer/login.php" class="btn btn-light">Login here</a>
      </div>
    </div>
  </div>
</body>

</html>