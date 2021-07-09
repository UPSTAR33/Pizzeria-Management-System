<?php
  include('includes/loginCheck.php');
  include('includes/connection.php');
  if(isset($_POST['addItem'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $sql="INSERT INTO menu(name,price,category) VALUES ('$name','$price','$category')";
    $result = mysqli_query($con,$sql);
    if(mysqli_error($con)){
      $err = "Not Added ".mysqli_error($con);
      echo "<script>alert('$err');</script>";
    }
    else {
      echo "<script>alert('Item Added');</script>";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Item</title>
  <link rel="stylesheet" href="styles/addItem.css">
</head>
<body class="bg">
  <?php include('topMenu.php') ?>
  <div class="container">
    <div>
      <br><br><br><br>
      <h1 class="h1">Add Item</h1>
      <br>
    </div>
  <div>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
      <label for="name">Name</label><br>
      <input type="text" name="name" id="name" required><br><br>
      <label for="price">Price</label><br>
      <input type="number" min="0" name="price" id="price"><br><br>
      <label for="category">Category</label><br>
      <input type="text" name="category" id="category" required><br><br>
      <button class="btn btn-dark" name="addItem" type="submit">Add Item</button><br>
    </form>
  </div>
</body>
</html>