<link rel="stylesheet" href="styles/topMenu.css">
<div class="greeting">
  Hello,
  <?php echo $_SESSION['name'] ?>
</div>
<form action="logout.php" method="POST" class="logoutbtn">
  <a href="index.php">Home</a> 
  &emsp14;
  <button type="submit" class="btn btn-danger" name="logout">Logout</button>
</form>