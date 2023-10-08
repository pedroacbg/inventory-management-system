<?php
// Start the session.
session_start();
if (!isset($_SESSION['user'])) header('location: login.php');
$_SESSION['table'] = 'users';

$user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
  <script src="https://kit.fontawesome.com/e1279f9b9d.js" crossorigin="anonymous"></script>
  <script defer type="text/javascript" src="js/index.js"></script>
  <title>IMS Dashboard - Inventory Management System</title>
</head>

<body>
  <div id="dashboard">
    <?php include('partials/sidebar.php') ?>
    <div class="dashboard-content-container">
      <?php include('partials/app-topnav.php') ?>
      <div class="dashboard-content">
        <div class="dashboard-content-main">
          <div class="user-add-form-container">
            <form action="database/add.php" method="POST" class="app-form">
              <div class="app-form-container">
                <label for="">First Name</label>
                <input type="text" class="app-form-input" id="first_name" name="first_name" placeholder="First Name" autocomplete="off" />
              </div>
              <div class="app-form-container">
                <label for="">Last Name</label>
                <input type="text" class="app-form-input" id="last_name" name="last_name" placeholder="Last Name" autocomplete="off" />
              </div>
              <div class="app-form-container">
                <label for="">Email</label>
                <input type="text" class="app-form-input" id="email" name="email" placeholder="Email" autocomplete="off" />
              </div>
              <div class="app-form-container">
                <label for="">Password</label>
                <input type="password" class="app-form-input" id="password" name="password" placeholder="Password" />
              </div>
              <button type="submit" class="app-form-btn"><i class="fa fa-plus"></i> Add User</button>
            </form>
            <?php if (isset($_SESSION['response'])) {
              $response_message = $_SESSION['response']['message'];
              $is_success = $_SESSION['response']['success']
            ?>
              <div class="response-message">
                <p class="response-message <?= $is_success ? 'response-message--success' : 'response-message--error' ?>">
                  <?= $response_message ?>
                </p>
              </div>
            <?php unset($_SESSION['response']);
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>