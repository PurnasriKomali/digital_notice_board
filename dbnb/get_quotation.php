<?php
// Replace 'localhost', 'root', '', and 'dnb' with your actual database credentials
$conn = new mysqli('localhost', 'root', '', 'dnb');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentDate = date('Y-m-d');
$currentMonth = date('m');

// Fetch the data from the database for today's date and month
$sql = "SELECT quote FROM quote WHERE MONTH(date) = MONTH(CURDATE()) AND DAYOFMONTH(date) = DAYOFMONTH(CURDATE()) ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$quotation = $row['quote'];
} else {
	$quotation = "No quotation available.";
}

// Close the database connection
$conn->close();

// Return the quotation as the response to the AJAX request
echo $quotation;
?>
