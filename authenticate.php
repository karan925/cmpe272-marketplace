<!DOCTYPE html>
<html>
<header>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <!-- build:css css/main.css -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <link rel="stylesheet" href="style.css">

<div class="topnav">
  <a href="./home.php">Home</a>
  <a href="./companies_link.php">Marketplace Members</a>
  <a href="./reviews.php">Add a Review</a>
  <a href="./marketplace_popular.php">Most Popular Products</a>
  <a href="./visit_history.php">My History</a>
  <a class = "active" href="./authenticate.php">Log In/Sign Up</a>
  <a href="./logout.php">Log Out</a>
</div>
</header>
<body>

<h3 class="offset-4">Log In</h3>
<div class="Container">
    <form action="login.php" method="post">
        <div class="form-row">
            <div class="form-group col-sm-4 offset-4">
                <td><strong>Username:</strong></td>
                <input type="text" class="mr-1 offset-1" name="Username" placeholder="Username">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4 offset-4">
                <td><strong>Password:</strong></td>
                <input type="text" class="mr-2 offset-1" name="Password" placeholder="Password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4 offset-4">
                <input type="submit" name="Enter" value="Enter">
            </div>
        </div>
    </form>
    </div>

<h3 class="offset-4">Register if you don't have an account</h3>
<div class="Container">
    <form action="register.php" method="post">
        <div class="form-row">
            <div class="form-group col-sm-4 offset-4">
                <td><strong>Username:</strong></td>
                <input type="text" class="mr-1 offset-1" name="Username" placeholder="Username">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4 offset-4">
                <td><strong>Password:</strong></td>
                <input type="text" class="mr-2 offset-1" name="Password" placeholder="Password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4 offset-4">
                <td><strong>Repeat Password:</strong></td>
                <input type="text" class="mr-2 offset-1" name="RepeatPassword" placeholder="Repeat Password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4 offset-4">
                <input type="submit" name="Enter" value="Enter">
            </div>
        </div>
    </form>
    </div>
</body>
</html>