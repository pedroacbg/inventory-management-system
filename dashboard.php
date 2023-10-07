<?php 
  // Start the session.
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');

  $user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
    <script
      src="https://kit.fontawesome.com/e1279f9b9d.js"
      crossorigin="anonymous"
    ></script>
    <script defer type="text/javascript" src="js/index.js"></script>
    <title>IMS Dashboard - Inventory Management System</title>
  </head>
  <body>
    <div id="dashboard">
      <div class="dashboard-sidebar">
        <h3 class="dashboard-title">IMS</h3>
        <div class="dashboard-sidebar-user">
          <img
            src="assets/img/user/calabreso.png"
            alt="User image"
            class="user-image"
          />
          <span class="user-name"><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
        </div>
        <div class="dashboard-sidebar-menus">
          <ul class="dashboard-menu-list">
            <li class="menu-active">
              <a href=""
                ><i class="fa-solid fa-gauge menu-icons"></i
                ><span class="menu-text"> Dashboard</span></a
              >
            </li>
            <li>
              <a href=""
                ><i class="fa-solid fa-bullhorn menu-icons"></i
                ><span class="menu-text"> Campaigns</span></a
              >
            </li>
            <li>
              <a href=""
                ><i class="fa-solid fa-dollar-sign menu-icons"></i></i
                ><span class="menu-text"> Reveneu Management</span></a
              >
            </li>
            <li>
              <a href=""
                ><i class="fa-solid fa-book menu-icons"></i
                ><span class="menu-text"> Accounts Receivable</span></a
              >
            </li>
            <li>
              <a href=""
                ><i class="fa-solid fa-gears menu-icons"></i
                ><span class="menu-text"> Configuration</span></a
              >
            </li>
            <li>
              <a href=""
                ><i class="fa-solid fa-chart-line menu-icons"></i
                ><span class="menu-text"> Stats</span></a
              >
            </li>
          </ul>
        </div>
      </div>
      <div class="dashboard-content-container">
        <div class="dashboard-content-nav">
          <a href="" id="toggle-btn"><i class="fa-solid fa-bars"></i></a>
          <a href="database/logout.php" id="logout-btn"
            ><i class="fa-solid fa-power-off"></i>Log-out</a
          >
        </div>
        <div class="dashboard-content">
          <div class="dashboard-content-main"></div>
        </div>
      </div>
    </div>
  </body>
</html>