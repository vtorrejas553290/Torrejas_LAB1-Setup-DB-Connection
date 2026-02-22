<?php
include "../db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $booking_id = $_POST['booking_id'];
  $amount = $_POST['amount_paid'];
  $method = $_POST['method'];

  mysqli_query($conn,"INSERT INTO payments(booking_id,amount_paid,method)
  VALUES($booking_id,$amount,'$method')");

  header("Location: payments_list.php");
}

$bookings = mysqli_query($conn,"SELECT booking_id,total_cost FROM bookings");
$payments = mysqli_query($conn,"SELECT * FROM payments ORDER BY payment_date DESC");
?>

<!doctype html>
<html>
<head><title>Payments</title></head>
<link rel="stylesheet" href="/assessment_beginner/style.css">
<body>
<div class="container">
<?php include "../nav.php"; ?>

<h2>Add Payment</h2>

<form method="POST">
Booking:<br>
<select name="booking_id">
<?php while($b=mysqli_fetch_assoc($bookings)){ ?>
<option value="<?php echo $b['booking_id']; ?>">
Booking #<?php echo $b['booking_id']; ?> (₱<?php echo $b['total_cost']; ?>)
</option>
<?php } ?>
</select><br><br>

Amount:<br>
<input type="number" step="0.01" name="amount_paid" required><br><br>

Method:<br>
<select name="method">
<option value="CASH">Cash</option>
<option value="GCASH">GCash</option>
<option value="BANK">Bank</option>
</select><br><br>

<button type="submit">Save Payment</button>
</form>

<hr>

<h2>Payment Records</h2>

<table border="1" cellpadding="8">
<tr>
<th>ID</th>
<th>Booking</th>
<th>Amount</th>
<th>Method</th>
<th>Date</th>
</tr>

<?php while($p=mysqli_fetch_assoc($payments)){ ?>
<tr>
<td><?php echo $p['payment_id']; ?></td>
<td><?php echo $p['booking_id']; ?></td>
<td>₱<?php echo number_format($p['amount_paid'],2); ?></td>
<td><?php echo $p['method']; ?></td>
<td><?php echo $p['payment_date']; ?></td>
</tr>
<?php } ?>
</table>

</div> 
</body>
</html>