<?php
include "../db.php";

$result = mysqli_query($conn,"
SELECT b.*, c.full_name, s.service_name
FROM bookings b
JOIN clients c ON b.client_id=c.client_id
JOIN services s ON b.service_id=s.service_id
ORDER BY b.created_at DESC
");
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bookings</title>
  <link rel="stylesheet" href="/assessment_beginner/style.css">
</head>
<body>
<div class="container">
<?php include "../nav.php"; ?>

<h2>Bookings</h2>

<!-- Create Booking Button -->
<a href="bookings_create.php"><button>Create Booking</button></a>

<!-- Bookings Table -->
<table>
<tr>
  <th>ID</th>
  <th>Client</th>
  <th>Service</th>
  <th>Date</th>
  <th>Hours</th>
  <th>Total</th>
  <th>Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
  <td><?php echo $row['booking_id']; ?></td>
  <td><?php echo $row['full_name']; ?></td>
  <td><?php echo $row['service_name']; ?></td>
  <td><?php echo $row['booking_date']; ?></td>
  <td><?php echo $row['hours']; ?></td>
  <td>₱<?php echo number_format($row['total_cost'],2); ?></td>
  <td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>
</table>

</div> 
</body>
</html>