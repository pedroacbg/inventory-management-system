<?php 
    // Start the session.
    session_start();
    if(isset($_SESSION['user'])) header('location: dashboard.php');

    $error_message = '';

    if($_POST){
      include('database/connection.php');

      $username = $_POST['username'];
      $password = $_POST['password'];

      $query = 'SELECT * FROM users WHERE users.email ="'. $username .'" AND users.password="' . $password .'" LIMIT 1';
      $stmt = $conn->prepare($query);
      $result = $stmt->execute();

      
      
      if($stmt->rowCount() > 0){
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll()[0];
        $_SESSION['user'] = $user;

        header('Location: dashboard.php');
      }else $error_message = 'Please make sure that username and password are correct...';
    
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <title>IMS Login - Inventory Management System</title>
  </head>
  <body id="login-body">
    <div class="container">

      <?php if(!empty($error_message)){ ?>
          <div class="error-message">
            <strong>ERROR:</strong> <p> <?= $error_message ?></p>
          </div>
      <?php } ?> 

      <div class="login-header">
        <h1>IMS</h1>
        <p>Inventory System Management</p>
      </div>
      <div class="login-body">
        <form action="login.php" method='POST' autocomplete="off">
          <div class="login-input-container">
            <label for="">Username</label>
            <input type="text" placeholder="username" name="username"/>
          </div>
          <div class="login-input-container">
            <label for="">Password</label>
            <input type="password" placeholder="password" name="password"/>
          </div>
          <div class="login-button-container">
            <button>Login</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
