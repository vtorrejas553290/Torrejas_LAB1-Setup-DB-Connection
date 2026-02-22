<?php
include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM clients ORDER BY created_at DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Clients</title>
  <link rel="stylesheet" href="/assessment_beginner/style.css">
</head>
<body>
<div class="container">
<?php include "../nav.php"; ?>

<h2>Clients</h2>
<a href="clients_add.php"><button>Add Client</button></a>

<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Address</th>
  <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row['client_id']; ?></td>
  <td><?php echo $row['full_name']; ?></td>
  <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['phone']; ?></td>
  <td><?php echo $row['address']; ?></td>
  <td>
    <a class="action-link" href="clients_delete.php?id=<?php echo $row['client_id']; ?>">Delete</a>
  </td>
</tr>
<?php } ?>
</table>

</div>
</body>
</html>