<?php
$data = $_POST;
$user_id = (int) $data['user_id'];
$first_name = $data['first_name'];
$last_name = $data['last_name'];

// Adding record
try {
  $command = "DELETE FROM users WHERE id={$user_id}";
  include('connection.php');

  $conn->exec($command);

  echo json_encode([
    'success' => true,
    'message' => $first_name . ' ' . $last_name . ' User successfully deleted.'
  ]);
} catch (\PDOException $e) {
  echo json_encode([
    'success' => false,
    'message' => 'Error processing your request.'
  ]);
}
