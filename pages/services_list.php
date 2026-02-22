<?php
include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM services");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Services</title>
  <link rel="stylesheet" href="/assessment_beginner/style.css">
</head>
<body>
<div class="container">
<?php include "../nav.php"; ?>

<h2>Services</h2>

<!-- Add Service Button -->
<a href="services_add.php"><button>Add Service</button></a>

<!-- Services Table -->
<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Rate</th>
  <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row['service_id']; ?></td>
  <td><?php echo $row['service_name']; ?></td>
  <td><?php echo $row['description']; ?></td>
  <td>₱<?php echo number_format($row['hourly_rate'],2); ?></td>
  <td><?php echo $row['is_active'] ? 'Active' : 'Inactive'; ?></td>
</tr>
<?php } ?>
</table>

</div> <!-- container -->
</body>
</html>