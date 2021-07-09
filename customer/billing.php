<?php
include('includes/loginCheck.php');
include_once('includes/connection.php');
include_once('includes/utilFuncs.php');
if (!isset($_POST['items']) || empty($_POST['items'])) {
  header('Location:orders.php');
}
foreach ($_POST['items'] as $id => $qty) {
  if (!$qty) unset($_POST['items'][$id]);
  if (empty($_POST['items'])) {
    header('Location:orders.php');
  }
}
$sql = "SELECT * from menu";
$menu = resultToArray(mysqli_query($con, $sql), 'item_id');
if (mysqli_error($con)) died(mysqli_error($con));
$sql = "SELECT * from cashier";
$cashier = mysqli_query($con, $sql);
if (mysqli_error($con)) died(mysqli_error($con));
$items = $_POST['items'];
$tot = 0;
foreach ($items as $id => $qty) {
  if ($qty) {
    $qty += 0;
    $menu[$id]['price'] += 0;
    $tot += $qty * $menu[$id]['price'];
  } else unset($items[$id]);
}
$order = array();
$order['items'] = $items;
$order['total'] = $tot;
$order['menu'] = $menu;
$_SESSION['order'] = $order;

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <title>Bill</title>
  <link rel="stylesheet" href="styles/billing.css">
</head>

<body>
  <div class="bg">
    <?php include_once('topMenu.php'); ?>
    <br /><br />
    <h1 class="h1 container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bill</h1>
    <table class="table table-striped table-borderless tb">
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Amount</th>
      </tr>
      <?php foreach ($items as $id => $qty) : ?>
        <tr>
          <td><?php echo $menu[$id]['name']; ?></td>
          <td><?php echo $menu[$id]['price']; ?></td>
          <td><?php echo $qty; ?></td>
          <td><?php echo $menu[$id]['price'] * $qty; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <div>
      <h1 class="totamt">Total Amt= <?php echo $tot; ?></h1><br>
    </div>
    <div>
      <form action="status.php" method="POST">
        <label class="log2" for="cashier">Paying Bill to:</label>
        <select class="btn btn-secondary" name="cashier" id="cashier">
          <?php
          if (mysqli_num_rows($cashier) > 0) {
            while ($row = mysqli_fetch_assoc($cashier)) {
          ?>
              <option value="<?php echo $row['cid'] ?>"><?php echo $row['name'] ?></option>
          <?php
            }
          }
          ?>
        </select>
        <br />
        <div class="placebtn">
          <button type="submit" name="placeOrder" class="btn btn-success">Place Order</button>
        </div>
      </form>
      <div class="cancelbtn">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
          <button type="submit" name="cancelOrder" class="btn btn-outline-danger">Cancel Order</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST['cancelOrder'])) {
  header('Location:orders.php');
}
?>