<!DOCTYPE html>
<html>
    <head>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
  <title>Admin Login</title>
  

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Options</title>
    <link rel="stylesheet"  href="styles/options.css">
</head>
<body >
    <div class="bg">  
        <div class="greeting">
        Hello, <%= data["admin_details"].name %>
        </div>
    <div class="container">
        <div>
            <br>
            <br><br>
            <h1 class="h1">&nbsp;&nbsp;Admin Options</h1>
        </div>
        <div>
            <p class="log">Manage Admins:</p>
            &emsp;&emsp;
            <a class="btn btn-secondary btn-lg" href="/admin/options/addAdmin">Add Admin</a>
            &emsp;&emsp;
            <a class="btn btn-secondary btn-lg" href="/admin/options/removeAdmin.php">Remove Admin</a>
            <br><br>
            <p class="log">Manage Items:</p>
            &emsp;&emsp;
            <a class="btn btn-danger btn-lg" href="/admin/options/addItem">Add Item</a>
            &emsp;&emsp;&emsp;
            <a class="btn btn-danger btn-lg"href="/admin/options/removeItem">Remove Item</a>
            &emsp;&emsp;
            <a class="btn btn-danger btn-lg"href="/admin/options/updateItemPrice">Update Item Price</a>
            <br><br>
            <p class="log">Statistics:</p>
            &emsp;&emsp;
            <a class="btn btn-secondary btn-lg" href="/admin/options/itemstats">Item Stats</a>
        </div>
    </div>
    <div>
        <form action="/admin/logout" method="POST" class="logoutbtn">
            <button type="submit"  class="btn btn-danger">Logout</button>
        </form>
    </div>
    </div>
</body>
</html>