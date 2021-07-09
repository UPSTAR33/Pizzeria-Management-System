<?php
  include('includes/loginCheck.php');
  include('includes/connection.php');
  $sql="SELECT name,SUM(qty) as totqty FROM `menu` natural join `sold_items` group by item_id order by totqty DESC";
  $stats = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <title>Item Stats</title>
<link rel="stylesheet"  href="styles/itemstats.css">
</head>
<body>
  <div class="bg">
    <?php include_once('topMenu.php') ?>
    <div>
      <br>
      <h1 class="h1">&emsp;Item Statistics</h1>
    </div>
    <div class="container pt-3">
      <table class="table table-striped table-borderless tb" style="width: 50%;">
        <caption class="tableheading" >Ordered Items History</caption>
        <thead>
          <tr class="d-flex">
            <th class="col-2">Sr. No.</th>
            <th class="col-6">Name</th>
            <th class="col-3">Total Qty. ordered</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(mysqli_num_rows($stats) >0) {
              $idx = 1;
              while($row = mysqli_fetch_assoc($stats)){
          ?>
            <tr class="d-flex">
              <td class="col-2"><?php echo  $idx; ?></td>
              <td class="col-6"><?php echo $row['name'] ?></td>
              <td class="col-3"><?php echo $row['totqty'] ?></td>
            </tr>
          <?php
                $idx++;
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>