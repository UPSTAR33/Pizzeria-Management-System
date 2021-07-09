<?php
  include('includes/loginCheck.php');
  include('includes/connection.php');
  $query="SELECT * FROM menu";
  $menu = mysqli_query($con,$query);
  if(isset($_POST['updatePrice'])){
    $itemId = $_POST['selitem'];
    $newPrice = $_POST['newPrice'];
    $sql="UPDATE menu SET price='$newPrice' WHERE item_id='$itemId'";
    $result = mysqli_query($con,$sql);
    if(mysqli_error($con)){
      $err = "Not Updated ".mysqli_error($con);
      echo "<script>alert('$err');</script>";
    }
    else {
      echo "<script>alert('Item Updated');</script>";
      $menu = mysqli_query($con,$query);
    }
  };
?>
<!DOCTYPE html>
<html>
  <head>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Item Price</title>
  <link rel="stylesheet"  href="styles/updateItem.css">
</head>
<body class="bg">
  <?php include('topMenu.php') ?>
  <div class="container">
    <br><br><br>
    <h1 class="h1">Update Item Price</h1>
  </div>
  <div class="container">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return genValues()">
      <label for="item" class="log">Select Item to Update:</label>
      <select name="selitem" id="selitem">
        <?php 
          if(mysqli_num_rows($menu) > 0){
            while($row = mysqli_fetch_assoc($menu)){
        ?>
          <option value="<?php echo $row['item_id'] ?>" ><?php echo $row['name'] ?></option>
        <?php
            } 
          } 
        ?>
      </select>
      <br>
      <label for="newPrice" class="log">Enter New Price:</label>
      <input type="number" name="newPrice" id="newPrice">
      <br><br>
      <button type="submit" name="updatePrice" class="btn btn-dark" >Update Price</button>
    </form>
  </div>
</body>
</html>