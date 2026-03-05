<?php
session_start();
session_destroy();     // This clears the user's session
header("Location: login.php");  // This redirects to login page
exit();
?>