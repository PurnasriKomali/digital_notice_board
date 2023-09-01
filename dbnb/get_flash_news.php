<?php
$conn = new mysqli('localhost', 'root', '', 'dnb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT flash FROM flashnews ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $flashNewsContent = $row['flash'];
} else {
    $flashNewsContent = "No flash news available.";
}

$conn->close();

echo $flashNewsContent;
?>
