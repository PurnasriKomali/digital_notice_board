<?php
// Place this code in the get_achievements.php file

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'your_database_name');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the achievements from the database
$stmt = $conn->prepare("SELECT * FROM achievements");
$stmt->execute();
$result = $stmt->get_result();

// Check if data is available in the database
if (mysqli_num_rows($result) > 0) {
    // Get the current date
    $currentDate = new DateTime();

    // Array to store all achievements
    $allAchievements = array();

    // Iterate through the results and fetch data for each achievement
    while ($data = mysqli_fetch_assoc($result)) {
        $aname = $data['name'];
        $date = new DateTime($data['date']);
        $title = $data['title'];
        $category = $data['category'];
        $details = $data['details'];

        // Calculate the difference in days between the achievement date and the current date
        $dateDifference = $currentDate->diff($date)->days;

        // Check if the difference is less than or equal to 7 days
        $isWithinSevenDays = ($dateDifference <= 7);

        // Check if the achievement is within 7 days and not expired
        if ($isWithinSevenDays && $dateDifference >= 0) {
            // Store the achievement data in the array
            $allAchievements[] = array(
                'name' => $aname,
                'date' => $date->format('Y-m-d'),
                'title' => $title,
                'category' => $category,
                'details' => $details,
                'isActive' => $isWithinSevenDays
            );
        }
    }

    // Check if there are any achievements
    if (count($allAchievements) > 0) {
        // Iterate through the array and create the slides
        foreach ($allAchievements as $achievement) {
            ?>
            // Add the achievements slide content here
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">';
                <div class="sl-slide-inner">';
                    <div class="bg-img bg-img-5"></div>';
                    <h2 style="text-align: left; color: yellow;">';
                        <div class="container">';
                            <div class="row">';
                                <div class="col-md-4 col-sm-4">';
                                    <span>ACHIEVEMENTS</span>';
                                </div>';
                                <br>';
                                <div class="col-md-4 col-sm-4 responsive">';
                                    <h6 style="color:white; font-size: 45px;">Name of student: '.$achievement['name'].'</h6>';
                                    <h6 style="color:white; font-size: 45px;">Date of Achievement: '.$achievement['date'].'</h6>';
                                    <h6 style="color:white; font-size: 45px;">Type of Achievement: '.$achievement['title'].'</h6>';
                                    <h6 style="color:white; font-size: 45px;">Category: '.$achievement['category'].'</h6>';
                                    <h6 style="color:white; font-size: 45px;">Details: '.$achievement['details'].'</h6>';
                                </div>';
                            </div>';
                        </div>';
                    </h2>';
                </div>';
            </div>';
        <?php
        }
    } else {
        // No achievements found
        echo "No achievements found.";
    }
} else {
    // No data found in the database
    echo "No achievements found.";
}
?>
