<?php
$conn = new mysqli('localhost', 'root', '', 'dnb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getTodayBirthdays($conn) {
    $currentMonthDay = date('m-d');
    $sql = "SELECT * FROM birthday WHERE DATE_FORMAT(dob, '%m-%d') = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $currentMonthDay);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

$today_birthdays = getTodayBirthdays($conn);

if (!$today_birthdays) {
    echo "Error fetching birthdays: " . $conn->error;
} else {
    while ($row = $today_birthdays->fetch_assoc()) {
        $image_url = $row['image_url'];
        $name = $row['name'];
        ?>

        <!-- Slide with birthday wishes -->
        <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
                <div style="background-image: url('uploads/<?php echo $image_url; ?>'); background-size: cover; background-repeat: no-repeat; width: 100%; height: 80vh;" class="container">
                    <div class="poster">
                        <div class="poster-image">
                            <div class="image-frame">
                                <img src="uploads/<?php echo $image_url; ?>" width="300" height="200" alt="Birthday Person">
                            </div>
                        </div>
                        <div class="poster-wishes">
                            <h2 class="birthday-heading" style="color: red;">HAPPY BIRTHDAY!</h2>
                            <h3 class="birthday-name"><?php echo $name; ?></h3>
                            <h1>WISHES FROM FRIENDS</h1>
                            <ul class="wishes-list">
                                <!-- Add birthday wishes here if you want -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
$conn->close();
?>
