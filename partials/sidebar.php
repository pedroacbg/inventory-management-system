<div class="dashboard-sidebar">
  <h3 class="dashboard-title">IMS</h3>
  <div class="dashboard-sidebar-user">
    <img src="assets/img/user/calabreso.png" alt="User image" class="user-image" />
    <span class="user-name"><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
  </div>
  <div class="dashboard-sidebar-menus">
    <ul class="dashboard-menu-list">
      <!--class="menu-active"-->
      <li>
        <a href="./dashboard.php"><i class="fa-solid fa-gauge menu-icons"></i><span class="menu-text"> Dashboard</span></a>
      </li>
      <li>
        <a href="./users-add.php"><i class="fa-solid fa-user-plus menu-icons"></i></i><span class="menu-text"> Add User</span></a>
      </li>

    </ul>
  </div>
</div>