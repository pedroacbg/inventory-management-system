<?php
// Start the session.
session_start();
if (!isset($_SESSION['user'])) header('location: login.php');
$_SESSION['table'] = 'users';

$user = $_SESSION['user'];
$users = include('database/show-users.php');
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
          <div class="row">
            <div class="column column-5">
              <h1 class="column-title"><i class="fa-solid fa-plus"></i> Create User</h1>
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
            <div class="column column-7">
              <h1 class="column-title"><i class="fa-solid fa-list"></i> List of Users</h1>
              <div class="section-content">
                <div class="users">
                  <table>
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $user) { ?>
                        <tr>
                          <td><?= $user['id'] ?></td>
                          <td><?= $user['first_name'] ?></td>
                          <td><?= $user['last_name'] ?></td>
                          <td><?= $user['email'] ?></td>
                          <td><?= date('M d, Y @ H:i:s', strtotime($user['created_at'])) ?></td>
                          <td><?= date('M d, Y @ H:i:s', strtotime($user['updated_at'])) ?></td>
                          <td>
                            <a href=""><i class="fa fa-pencil"></i>Edit</a>
                            <a href="" class="delete-user" data-userid="<?= $user['id'] ?>" data-name="<?= $user['first_name'] ?>" data-lastname="<?= $user['last_name'] ?>"><i class="fa fa-trash"></i>Delete</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <p class="user-count"><?= count($users) ?> Users</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/index.js"></script>
  <script src="js/jquery/jquery-3.7.1.min.js"></script>
  <script>
    function script() {
      this.initialize = function() {
          this.registerEvents();
        },

        this.registerEvents = function() {
          document.addEventListener('click', function(e) {
            targetElement = e.target;
            classList = targetElement.classList;
            if (classList.contains('delete-user')) {
              e.preventDefault();
              userId = targetElement.dataset.userid;
              firstname = targetElement.dataset.name;
              lastname = targetElement.dataset.lastname;
              fullname = firstname + ' ' + lastname;

              if (window.confirm('Are you sure to delete ' + fullname + '?')) {
                $.ajax({
                  method: 'POST',
                  data: {
                    user_id: userId,
                    first_name: firstname,
                    last_name: lastname
                  },
                  url: 'database/delete-user.php',
                  dataType: 'json',
                  success: function(data) {
                    if (data.success) {
                      if (window.confirm(data.message)) {
                        location.reload();
                      }
                    } else {
                      window.alert(data.message);
                    }
                  }
                });
              }
            }
          });
        }
    };

    var script = new script();
    script.initialize();
  </script>
</body>

</html>