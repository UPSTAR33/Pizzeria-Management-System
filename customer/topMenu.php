<link rel="stylesheet" href="styles/topMenu.css">
<div class="greeting">
  Hello,
  <?php echo $_SESSION['name'] ?>
</div>
<form action="logout.php" method="POST" class="logoutbtn">
  <button type="submit" class="btn btn-danger" name="logout">Logout</button>
</form>