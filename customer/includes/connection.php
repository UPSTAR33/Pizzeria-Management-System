<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizzeria";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
  echo "<script>alert('Error connecting...')</script>";
}
?>
<?php function died($error)
{ ?>
  <script>
    alert("<?php echo $error; ?>")
  </script>
<?php } ?>

<?php
function check_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>