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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <div class="topnav">
    <a href="./home.php">Home</a>
    <a href="./companies_link.php">Marketplace Members</a>
    <a href="./reviews.php">Add a Review</a>
    <a href="./marketplace_popular.php">Most Popular Products</a>
    <a href="./visit_history.php">My History</a>
    <a class = "active" href="./authenticate.php">Log In/Sign Up</a>
    <a href="./logout.php">Log Out</a>
  </div>

  <style>
    .Container
    {
      text-align: center;
      padding: 20px 50px;
    }
    input[type=text]{
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
    }
    input[type=submit]{
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
    }
    input[type=text]:focus {
      background-color: lightblue;
    }
    h3{
      text-align: center;
      padding: 12px 20px;
    }
  </style>
</header>
<body>

  <h3>Log In</h3>
  <div class="Container">
    <form action="login.php" method="post">
      <div class="form-row">
        <div class="form-group col-sm-4 offset-4">
          <td><strong>Username:</strong></td>
          <input type="text" name="Username" placeholder="Username">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-sm-4 offset-4">
          <td><strong>Password:</strong></td>
          <input type="text" name="Password" placeholder="Password">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-sm-4 offset-4">
          <input type="submit" class="w3-button w3-light-blue w3-round-large" name="Enter" value="Enter">
        </div>
      </div>
    </form>
  </div>

  <?php
  echo "<br>";
  echo "<br>";
  ?> 


  <h3>Dont have an Account? Register Now!</h3>
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
          <input type="submit" class ="w3-button w3-light-blue w3-round-large" name="Enter" value="Enter">
        </div>
      </div>
    </form>
  </div>
</body>
</html>