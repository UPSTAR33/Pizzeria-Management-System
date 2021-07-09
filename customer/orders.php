<?php
include('includes/loginCheck.php');
include_once('includes/connection.php');
$sql = "SELECT * from menu";
$menu = mysqli_query($con, $sql);
if (mysqli_error($con)) died(mysqli_error($con));
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <title>Order</title>
  <link rel="stylesheet" href="styles/orders.css">
</head>

<body>
  <div class="bg">
    <?php include_once('topMenu.php'); ?>
    <br /><br />
    <p class="h1 container">Order here</p>
    <div class="container">
      <form action="billing.php" method="POST" class="form-group">
        <div style="display: table;" class="p-2">
          <?php
          if (mysqli_num_rows($menu) > 0) {
            while ($row = mysqli_fetch_assoc($menu)) {
          ?>
              <div style="display: table-row;">
                <div style="display: table-cell; padding:5px 20px 5px 5px;">
                  <label class="log3" for="<?php echo $row['item_id'] ?>"><?php echo $row['name'] ?></label>
                </div>
                <div style="display: table-cell;">
                  <input style="width:70%;" type="number" min="0" id="<?php echo $row['item_id'] ?>" name="items[<?php echo $row['item_id'] ?>]">
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-outline-success" type="submit" name="order">Place Order</button>
      </form>
    </div>
  </div>
</body>

</html>