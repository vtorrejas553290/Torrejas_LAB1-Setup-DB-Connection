<?php
include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id DESC");
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Clients</title></head>
<link rel="stylesheet" href="/assessment_beginner/style.css">
</head>
<body>
<?php include "../nav.php"; ?>
 
<h2>Clients</h2>
<a href="clients_add.php"><button>Add Client</button></a>
 
<table border="1" cellpadding="8">
  <tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th>
  </tr>
  <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['client_id']; ?></td>
      <td><?php echo $row['full_name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td>
        <a href="clients_edit.php?id=<?php echo $row['client_id']; ?>">Edit</a>
      </td>
    </tr>
  <?php } ?>
</table>
</body>
</html>


pages/clients_edit.php
 
<?php
include "../db.php";
 
$id = $_GET['id'];
 
$get = mysqli_query($conn, "SELECT * FROM clients WHERE client_id = $id");
$client = mysqli_fetch_assoc($get);
 
$message = "";
 
if (isset($_POST['update'])) {
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
 
  if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {
    $sql = "UPDATE clients
            SET full_name='$full_name', email='$email', phone='$phone', address='$address'
            WHERE client_id=$id";
    mysqli_query($conn, $sql);
    header("Location: clients_list.php");
    exit;
  }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Client</title></head>
<body>
<div class="container">
<?php include "../nav.php"; ?>
 
<h2>Edit Client</h2>
<p style="color:red;"><?php echo $message; ?></p>
 
<form method="post">
  <label>Full Name*</label><br>
  <input type="text" name="full_name" value="<?php echo $client['full_name']; ?>"><br><br>
 
  <label>Email*</label><br>
  <input type="text" name="email" value="<?php echo $client['email']; ?>"><br><br>
 
  <label>Phone</label><br>
  <input type="text" name="phone" value="<?php echo $client['phone']; ?>"><br><br>
 
  <label>Address</label><br>
  <input type="text" name="address" value="<?php echo $client['address']; ?>"><br><br>
 
  <button type="submit" name="update">Update</button>
</form>

</div>
</body>
</html>