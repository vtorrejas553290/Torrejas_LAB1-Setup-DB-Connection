<?php
include "../db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  mysqli_query($conn,"INSERT INTO clients(full_name,email,phone,address)
  VALUES('$name','$email','$phone','$address')");

  header("Location: clients_list.php");
}
?>

<!doctype html>
<html>
<head><title>Add Client</title></head>
<link rel="stylesheet" href="/assessment_beginner/style.css">
<body>
<div class="container">
<?php include "../nav.php"; ?>

<h2>Add Client</h2>

<form method="POST">
  Name:<br>
  <input type="text" name="full_name" required><br><br>

  Email:<br>
  <input type="email" name="email" required><br><br>

  Phone:<br>
  <input type="text" name="phone"><br><br>

  Address:<br>
  <input type="text" name="address"><br><br>

  <button type="submit">Save</button>
</form>

</dev>
</body>
</html>