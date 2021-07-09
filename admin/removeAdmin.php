<?php
  include('includes/loginCheck.php');
  include('includes/connection.php');
  $query="SELECT * FROM admin";
  $admins = mysqli_query($con,$query);
  
  if(isset($_POST['removeAdmin'])){
    $adminId = $_POST['seladmin'];
    $sql="DELETE FROM admin WHERE admin_id='$adminId'";
    $result = mysqli_query($con,$sql);
    if(mysqli_error($con)){
      $err = "Not Removed ".mysqli_error($con);
      echo "<script>alert('$err');</script>";
    }
    else {
      echo "<script>alert('Admin Removed');</script>";
      $admins = mysqli_query($con,$query);
    }
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remove Admin</title>
  <link rel="stylesheet"  href="styles/removeAdmin.css">
</head>
<body class="bg">
  <?php include('topMenu.php') ?>
  <div class="container">
    <br>
    <br>
    <h1 class="h1">Remove Admin</h1>
  </div>
  <div class="container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
      <label for="seladmin" class="log">Select Admin to Remove:</label>
      <select name="seladmin" id="seladmin">
        <?php 
          if(mysqli_num_rows($admins) > 0){
            while($row = mysqli_fetch_assoc($admins)){
        ?>
          <option value="<?php echo $row['admin_id'] ?>" ><?php echo $row['name'] ?></option>
        <?php
            } 
          } 
        ?>
      </select>
      <br><br>
      <button class="btn btn-dark btn-md" type="submit" name="removeAdmin">Remove Admin</button>
    </form>
  </div>
</body>
</html>