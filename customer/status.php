<?php
  include('includes/loginCheck.php');
  include_once('includes/connection.php');
  if(!isset($_POST['cashier']) || !isset($_SESSION['order'])){
    header('Location:orders.php');
  }
  $ok = false;
  $order = $_SESSION['order'];
  $items = $order['items'];
  $total = $order['total'];
  $menu = $order['menu'];
  $custId = $_SESSION['custId'];
  $cashierId = $_POST['cashier'];


  // $sql = "INSERT INTO orders(cust_id, order_date) VALUES ($custId,(SELECT CURRENT_DATE from DUAL))";
  // mysqli_query($con, $sql);
  // if(mysqli_error($con))died(mysqli_error($con));

  // $sql = "INSERT INTO bill(order_id, cid, amt) VALUES ((SELECT COUNT(order_id) FROM orders), $cashierId, $total)";
  // mysqli_query($con, $sql);
  // if(mysqli_error($con))died(mysqli_error($con));

  // foreach($items as $id => $qty){
  //   $price = $menu[$id]['price'];
  //   $sql = "INSERT INTO sold_items(order_id, item_id, qty, sold_at) VALUES ((SELECT COUNT(order_id) FROM orders), $id, $qty, $price)";
  //   mysqli_query($con, $sql);
  //   if(mysqli_error($con))died(mysqli_error($con));
  // }
  $ok = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bill</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet"  href="styles/status.css">
</head>
<body>
<div class="bg">
 <?php include_once('topMenu.php'); ?>

  <br><br><br><br><br><br>
  <?php
    if($ok):
  ?>
  <p class="container h1">ORDER PLACED</p>
  <?php else: ?>
    <p class="container h1">ERROR WHILE PLACING ORDER</p>
  <?php endif; ?>
</div>
</body>
</html>