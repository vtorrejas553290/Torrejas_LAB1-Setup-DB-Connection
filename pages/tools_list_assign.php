<?php
include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM tools");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tools</title>
  <link rel="stylesheet" href="/assessment_beginner/style.css">
</head>
<body>
<div class="container">
<?php include "../nav.php"; ?>

<h2>Tools Inventory</h2>

<!-- Add Tool Button -->
<a href="tools_add.php"><button>Add Tool</button></a>

<!-- Tools Table -->
<table>
<tr>
  <th>ID</th>
  <th>Tool</th>
  <th>Total</th>
  <th>Available</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?php echo $row['tool_id']; ?></td>
  <td><?php echo $row['tool_name']; ?></td>
  <td><?php echo $row['quantity_total']; ?></td>
  <td><?php echo $row['quantity_available']; ?></td>
</tr>
<?php } ?>
</table>

</div> 
</body>
</html>