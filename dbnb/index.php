<?php
$conn = new mysqli('localhost', 'root', '', 'dnb');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT flash FROM flashnews ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$flashNewsContent = $row['flash'];
} else {
	$flashNewsContent = "No flash news available.";
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

?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>DIGITAL NOTICE BOARD OF SRKREC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Fullscreen Slit Slider with CSS3 and jQuery" />
	<meta name="keywords" content="SRKR Digital Notice Board" />
	<meta name="author" content="MCR Web Solutions" />
	<meta http-equiv="refresh" content="60">
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/custom.css" />
	<link rel="stylesheet" type="text/css" href="styles.css" />

	<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
	<noscript>
		<link rel="stylesheet" type="text/css" href="css/styleNoJS.css" />
	</noscript>
	<style>
		body {
			background-color: #ffffff;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.sl-slide {
			text-align: center;
			font-size: 50px;

		}

		.dem {
			font-size: 80px;
			text-align: center;
		}

		.container {
			text-align: center;
		}

		.birthday-heading {
			font-size: 50px;
			color: red;
			margin: 20px 0;
			/* Adjusted the vertical margin to create space above and below the heading */
			line-height: 1.5em;
		}

		.birthday-name {
			font-size: 40px;
			color: violet;
			margin: 5px 0;
			/* Adjusted the vertical margin to create space above and below the name */
		}

		.poster {
			display: flex;
			align-items: center;
			margin-top: 20px;
			/* Adjusted the top margin to create space above the poster */
			position: relative;
		}

		.poster-image {
			flex: 0 0 33.33%;
			/* 1/3 of the page width */
			padding: 30px;
			box-sizing: border-box;
			/* Added box-sizing to include padding in the width calculation */
		}

		.poster img {
			max-width: 100%;
			height: auto;
			border-radius: 20px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
			object-fit: cover;
		}

		.poster-wishes {
			flex: 0 0 66.66%;
			/* 2/3 of the page width */
			padding: 20px;
			line-height: 1.5em;
		}

		.poster-wishes h1 {
			font-size: 40px;
			margin: 0;
		}

		.wishes-list {
			padding-left: 25px;
			font-size: 20px;
			font-family: 'Oswald', Arial;
			list-style-type: none;
		}

		.wishes-list li {
			margin-bottom: 10px;
			line-height: 1.5em;
		}
		.responsive {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    text-align: left;
    margin-top: 20px;
    height: 100%;
}

.responsive h6 {
    display: block;
    font-size: 45px;
    color: white;
    line-height: 1.5;
    margin: 0;
    padding-left: 10px; /* Adjust this value for indentation */
}

#slider {
    height: 75vh;
}

.image-frame {
        padding: 15px;
        border-radius: 20px; /* Rounded corners */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Subtle shadow effect */
        background-color: #fff; /* White background color */
        text-align: center; /* Center the image and content */
        position: relative;
        overflow: hidden;
    }

    .decorative-border {
        position: relative;
        display: inline-block;
        padding: 15px;
        background: linear-gradient(to bottom right, #fcc2c3, #fff);
    }

    .decorative-border:before,
    .decorative-border:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        border: 8px solid #fcc2c3; /* Lighter pink border */
        z-index: -1;
    }

    .decorative-border:before {
        top: -15px;
        left: -15px;
        border-radius: 15px;
        transform: rotate(45deg);
    }

    .decorative-border:after {
        bottom: -15px;
        right: -15px;
        border-radius: 15px;
        transform: rotate(45deg);
    }

    .decorative-border img {
        max-width: 100%;
        height: auto;
        border-radius: 10px; /* Slightly rounded corners for the image */
    }
	</style>


</head>

<body>

	<div class="container demo-2">

		<!-- Codrops top bar -->

		<div id="slider" class="sl-slider-wrapper">

			<div class="sl-slider">


				<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
					<div class="sl-slide-inner">
					<div class="bg-img" style="background-image: url('images/Quotes.png'); width: 100%; height: 100vh;"></div>
						<div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
							<h1 style="color: #fff; font-size: 45px; margin-bottom: 25px;">Today's Quotation</h1>
							<div class="dem" blockquote id="quote" style="color: #333; font-size: 60px;">
								<!-- This is where the initial quote will be displayed -->
							</div>
							<!-- Add a new div to display the fetched quotation -->
							<div class="fetched-quotation" style="color: #fff; font-size: 45px; margin-top: 25px;" id="fetched-quote"><?php echo "$quotation" ?></div>
						</div>
					</div>
				</div>
				<script>
        function fetchQuotation() {
            // Create an XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure the request
            xhr.open("GET", "get_quotation.php", true);

            // Set up the event handler to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Update the quotation content
                        document.getElementById("fetched-quote").innerText = xhr.responseText;
                    } else {
                        console.error("Failed to fetch quotation: " + xhr.status);
                    }
                }
            };

            // Send the request
            xhr.send();
        }

        // Fetch quotation initially
        fetchQuotation();

        // Fetch quotation every 5 seconds
        setInterval(fetchQuotation, 5000); // 5000 milliseconds = 5 seconds
    </script>



					<!-- Add the second slide with birthday wishes -->
					<?php
function getTodayBirthdays($conn) {
    $currentMonthDay = date('m-d');
    $sql = "SELECT * FROM birthday WHERE DATE_FORMAT(dob, '%m-%d') = '$currentMonthDay'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

$today_birthdays = getTodayBirthdays($conn);

if (!$today_birthdays) {
    echo "Error fetching birthdays: " . mysqli_error($conn);
} else {
    while ($row = mysqli_fetch_assoc($today_birthdays)) {
        $image_url = $row['image_url'];
        $name = $row['name'];
?>

        <!-- Add the slide with birthday wishes -->
        <!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
        <div class="sl-slide-inner">
            <div style="background-image: url('images/birthdays.png'); background-size: cover; background-repeat: no-repeat; width: 100%; height: 80vh;" class="container">
                <div class="poster">
                    <div class="poster-image">
                        <div class="image-frame">
                            <img src="uploads/<?php echo $image_url; ?>" width="300" height="200" alt="Birthday Person">
                        </div>
                    </div>
                    <div class="poster-wishes">
                        <h2 class="birthday-heading" style="color: red; font-family: 'Dancing Script', cursive;">HAPPY BIRTHDAY!</h2>
                        <h3 class="birthday-name" style="font-family: 'Dancing Script', cursive; font-size:50px;"><?php echo $name; ?></h3>
                        <h1>WISHES FROM FRIENDS</h1>
                        <ul class="wishes-list">
							<li style="color:bisque"> May this birthday brings u lot's of happiness </li>
							<li style="color:bisque"> It's your special day — get out there and celebrate! </li>
							<li style="color:bisque"> I hope your celebration gives you many happy memories! </li>
							<li style="color:bisque">Our age is merely the number of years the world has been enjoying us!</li>
                            <!-- Add birthday wishes here if you want -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    }
}
?>
<script>
   function fetchBirthdays() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_birthdays.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log("Response:", xhr.responseText);
                document.getElementById("birthdaySlide").innerHTML = xhr.responseText;
            } else {
                console.error("Failed to fetch birthdays: " + xhr.status);
            }
        }
    };
    xhr.send();
}


    // Fetch birthdays initially
    fetchBirthdays();

    // Fetch birthdays every 5 seconds
    setInterval(fetchBirthdays, 5000); // 5000 milliseconds = 5 seconds
</script>



<?php
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

    <!-- Add the achievements slide content here -->
    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
    <div class="sl-slide-inner" style="background-image: url('images/congratulations.png'); background-size: cover; background-repeat: no-repeat; padding: 20px;">
        <h2 style="text-align: left; color: yellow;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        
                    </div>
                    <br>
                    <div class="col-md-4 col-sm-4 responsive">
                        <h6 style="color: white; font-size: 45px;">Name of student: <?php echo $achievement['name']; ?></h6>
                        <h6 style="color: white; font-size: 45px;">Date of Achievement: <?php echo $achievement['date']; ?></h6>
                        <h6 style="color: white; font-size: 45px;">Type of Achievement: <?php echo $achievement['title']; ?></h6>
                        <h6 style="color: white; font-size: 45px;">Category: <?php echo $achievement['category']; ?></h6>
                        <h6 style="color: white; font-size: 45px;">Details: <?php echo $achievement['details']; ?></h6>
                    </div>
                </div>
            </div>
        </h2>
    </div>
</div>


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
<script>
    // Function to fetch the achievements content from the server
    function fetchAchievements() {
        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Configure the request
        xhr.open("GET", "get_achievements.php", true);

        // Set up the event handler to handle the response
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Replace the existing slider content with the fetched data
                    document.querySelector(".slider-container").innerHTML = xhr.responseText;
                } else {
                    console.error("Failed to fetch achievements: " + xhr.status);
                }
            }
        };

        // Send the request
        xhr.send();
    }

    // Fetch achievements initially
    fetchAchievements();

    // Fetch achievements every 5 seconds
    setInterval(fetchAchievements, 5000); // 5000 milliseconds = 5 seconds
</script>







				<nav id="nav-dots" class="nav-dots" style='text-align:right;'>
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>

				</nav>

			</div>
		</div>
		<div class="content-wrapper">
			<h1>CAMPUS FLASH NEWS</h1>
			<div class="marquee" style="height: 85px; background-color:white" >
				<p style='font-size:50px;' id="flashNews"><?php echo $flashNewsContent; ?></p>
			</div>
		</div>
		<script>
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4) {
					console.log(xhr.status); // Check the status of the AJAX call
					console.log(xhr.responseText);

					function fetchFlashNews() {
						// Create an XMLHttpRequest object
						var xhr = new XMLHttpRequest();

						// Configure the request
						xhr.open("GET", "get_flash_news.php", true);

						// Set up the event handler to handle the response
						xhr.onreadystatechange = function() {
							if (xhr.readyState === XMLHttpRequest.DONE) {
								if (xhr.status === 200) {
									// Update the flash news content
									document.getElementById("flashNews").innerText = xhr.responseText;
								} else {
									console.error("Failed to fetch flash news: " + xhr.status);
								}
							}
						};

						// Send the request
						xhr.send();
					}

					// Fetch flash news initially
					fetchFlashNews();

					// Fetch flash news every 5 seconds
					setInterval(fetchFlashNews, 5000); // 5000 milliseconds = 5 seconds
				}
			};
		</script>

		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
		<script type="text/javascript" src="js/jquery.slitslider.js"></script>
		<script type="text/javascript">
			$(function() {

				$.Slitslider.defaults = {
					// transitions speed
					speed: 800,
					// if true the item's slices will also animate the opacity value
					optOpacity: false,
					// amount (%) to translate both slices - adjust as necessary
					translateFactor: 230,
					// maximum possible angle
					maxAngle: 55,
					// maximum possible scale
					maxScale: 2,
					// slideshow on / off
					autoplay: true,
					// keyboard navigation
					keyboard: true,
					// time between transitions
					interval:7000,
					// callbacks
					onBeforeChange: function(slide, idx) {
						return false;
					},
					onAfterChange: function(slide, idx) {
						return false;
					}
				};
				var Page = (function() {

					var $nav = $('#nav-dots > span'),
						slitslider = $('#slider').slitslider({
							onBeforeChange: function(slide, pos) {

								$nav.removeClass('nav-dot-current');
								$nav.eq(pos).addClass('nav-dot-current');

							}
						}),

						init = function() {

							initEvents();

						},
						initEvents = function() {

							$nav.each(function(i) {

								$(this).on('click', function(event) {

									var $dot = $(this);

									if (!slitslider.isActive()) {

										$nav.removeClass('nav-dot-current');
										$dot.addClass('nav-dot-current');

									}

									slitslider.jump(i + 1);
									return false;

								});

							});

						};

					return {
						init: init
					};

				})();

				Page.init();



			});
		</script>
</body>

</html>