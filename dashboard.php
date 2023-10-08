<?php
// Start the session.
session_start();
if (!isset($_SESSION['user'])) header('location: login.php');

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
        <div class="dashboard-content-main"></div>
      </div>
    </div>
  </div>
</body>

</html>