<?php
include('config.php');
include('header.php');
session_start();

if (!isset($_SESSION['uuid'])) {
  // User is not logged in, redirect to login page
  header('Location: login.php');
  exit();
}

$uuid = $_SESSION['uuid'];

$query = "SELECT * FROM loginn WHERE Login_id='$uuid'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
  // Retrieve admin information
  $row = mysqli_fetch_assoc($result);
  $admin_name = $row['Admin_name'];
  $admin_email = $row['Admin_Email'];
  $admin_location = $row['Admin_location'];
  $admin_phone = $row['Admin_phone_number'];
?>

<form method="post" action="update_admin.php">
  <label for="admin_name">Admin Name:</label>
  <input type="text" name="Admin_name" id="admin_name" value="<?php echo $admin_name; ?>"><br>
  <label for="admin_email">Admin Email:</label>
  <input type="email" name="Admin_Email" id="admin_email" value="<?php echo $admin_email; ?>"><br>
  <label for="admin_location">Admin Location:</label>
  <input type="text" name="Admin_location" id="admin_location" value="<?php echo $admin_location; ?>"><br>
  <label for="admin_phone">Admin Phone Number:</label>
  <input type="tel" name="Admin_phone_number" id="admin_phone" value="<?php echo $admin_phone; ?>"><br>
  <input type="submit" value="Update">
</form>

<?php
} else {
  // No admin found
  echo "No admin found.";
}
?>
