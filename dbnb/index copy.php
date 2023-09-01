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

// Assuming you have an 'id' parameter to fetch a specific record from the database
$sql = "SELECT * FROM `achievements`";
$result = mysqli_query($conn, $sql);

// Check if data is available in the database
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $aname = $data['name'];
    $date = $data['date'];
    $title = $data['title'];
    $category = $data['category'];
    $details = $data['details'];
} else {
    // No data found in the database
    $name = "No data found.";
    $date = "";
    $title = "";
    $category = "";
    $details = "";
}
					   
$sql = "SELECT quote FROM quote ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quotation = $row['quote'];
} else {
    $quotation = "No quotation available.";
}

$conn->close();



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
            margin: 20px 0; /* Adjusted the vertical margin to create space above and below the heading */
            line-height: 1.5em;
        }

        .birthday-name {
            font-size: 40px;
            color: violet;
            margin: 5px 0; /* Adjusted the vertical margin to create space above and below the name */
        }

        .poster {
            display: flex;
            align-items: center;
            margin-top: 20px; /* Adjusted the top margin to create space above the poster */
            position: relative;
        }

        .poster-image {
            flex: 0 0 33.33%; /* 1/3 of the page width */
            padding: 30px;
            box-sizing: border-box; /* Added box-sizing to include padding in the width calculation */
        }

        .poster img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            object-fit: cover;
        }

        .poster-wishes {
            flex: 0 0 66.66%; /* 2/3 of the page width */
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
		
    </style>


    </head>
    <body>
        
        <div class="container demo-2">
		
			<!-- Codrops top bar -->
 
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
					
					
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
						<div class="sl-slide-inner">
							<div class="bg-img" style="background-color: #3498db; width: 100%; height: 100vh;"></div>
							<div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
								<h1 style="color: #fff; font-size: 45px; margin-bottom: 25px;">Today's Quotation</h1>
								<div class="dem" blockquote id="quote" style="color: #333; font-size: 60px;">
									<!-- This is where the initial quote will be displayed -->
								</div>
								<!-- Add a new div to display the fetched quotation -->
								<div class="fetched-quotation" style="color: #fff; font-size: 45px; margin-top: 25px;" id="fetched-quote"> <?php echo "$quotation"?></div>
							</div>
							<script>
								// Function to fetch the quotation using AJAX
								function fetchQuotation() {
									var xhr = new XMLHttpRequest();
									xhr.open("GET", "get_quote.php", true);
									xhr.onreadystatechange = function () {
										if (xhr.readyState === 4 && xhr.status === 200) {
											var response = JSON.parse(xhr.responseText);
											if (response.quotation) {
												// Update the quotes array with the fetched quotation
												quotes.push(response.quotation);

												// Display the fetched quotation in the new div
												var fetchedQuoteElement = document.getElementById("fetched-quote");
												fetchedQuoteElement.textContent = response.quotation;
											}
										}
									};
									xhr.send();
								}

								// Array of quotes
								var quotes = [
									// Your initial quote(s) here
								];

								var currentQuoteIndex = 0;
								var quoteElement = document.getElementById("quote");

								// Function to display the next quote
								function showNextQuote() {
									quoteElement.textContent = quotes[currentQuoteIndex];
									currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
								}

								// Automatically change quote every 24 hours
								function changeQuoteEvery24Hours() {
									fetchQuotation(); // Fetch a new quote from the server
									showNextQuote(); // Display the new quote
									setTimeout(changeQuoteEvery24Hours, 24 * 60 * 60 * 1000); // 24 hours in milliseconds
								}

								// Display the first quote initially
								showNextQuote();

								// Start the quote change loop
								changeQuoteEvery24Hours();
							</script>
						</div>
					</div>


	
					<!-- ... Previous HTML content ... -->

<div class="container demo-2">
    <!-- Codrops top bar -->
    <!-- ... Previous HTML content ... -->

    <div id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">
            <!-- ... Previous slide content ... -->
            <!-- The second slide with birthday wishes content -->
            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                <!-- ... Previous slide content ... -->

                <!-- Update the birthday wishes section with actual variables -->
                <div class="poster-image">
                    <img src="uploads/<?php echo @$imageData_reference['image_url']; ?>" width="300" height="200" alt="Birthday Person">
                </div>
                <div class="poster-wishes">
                    <h2 class="birthday-heading" style="color: red;">HAPPY BIRTHDAY!</h2>
                    <h3 class="birthday-name"><?php echo @$name_reference; ?></h3>
                    <h1>WISHES FROM FRIENDS</h1>
                    <ul class="wishes-list">
                        <li>May your special day be filled with joy and laughter!</li>
                        <li>Wishing you health, happiness, and all the best on your birthday.</li>
                        <li>You’re older today than yesterday but younger than tomorrow, happy birthday!</li>
                        <li>Cheers on your birthday. One step closer to adult underpants</li>
                    </ul>
                </div>
                <!-- End of birthday wishes content -->
            </div>
            <!-- ... Next slide content ... -->
        </div>
        <!-- ... Navigation dots ... -->
    </div>

    <!-- ... Rest of the HTML content ... -->
    <!-- ... Script section ... -->
    <script>
        // ... The existing scripts ...

        // Function to fetch the quotation using AJAX
        function fetchQuotation() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_quote.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.quotation) {
                        // Update the quotes array with the fetched quotation
                        quotes.push(response.quotation);

                        // Display the fetched quotation in the new div
                        var fetchedQuoteElement = document.getElementById("fetched-quote");
                        fetchedQuoteElement.textContent = response.quotation;
                    }
                }
            };
            xhr.send();
        }

        // ... The rest of the existing scripts ...
    </script>
</div>



					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="bg-img bg-img-5"></div>
							<h2 style="text-align: left; color: yellow;">
								<div class="container">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<span>ACHIEVEMENTS</span>

										</div>
										<br>
										<div class="col-md-4 col-sm-4 responsive">
										<h6 style="color:white; font-size: 45px;">Name of student:  <?php echo @$aname; ?></h6>
										<h6 style="color:white; font-size: 45px;">Date of Achievement: <?php echo @$date; ?></h6>
										<h6 style="color:white; font-size: 45px;">Type of Achievement: <?php echo @$title; ?></h6>
										<h6 style="color:white; font-size: 45px;">Category: <?php echo @$category; ?></h6>
										<h6 style="color:white; font-size: 45px;">Details: <?php echo @$details; ?></h6>
									</div>
								</div>
							</div>
						</h2>
						<blockquote><p></p><cite></cite></blockquote>
					</div>

				</div>

					

					<nav id="nav-dots" class="nav-dots" style='text-align:right;'>
							<span class="nav-dot-current"></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</nav>

					</div>

					<div class="content-wrapper">
						<h1>CAMPUS FLASH NEWS</h1>
							<div class="marquee">
								<p style='font-size:50px;' id="flashNews"><?php echo $flashNewsContent; ?></p>
						</div>
					</div>
		<script>
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
    </script>
        </div>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
		<script type="text/javascript" src="js/jquery.slitslider.js"></script>
		<script type="text/javascript">	
			$(function() {

			$.Slitslider.defaults 	= {
				// transitions speed
				speed : 800,
				// if true the item's slices will also animate the opacity value
				optOpacity : false,
				// amount (%) to translate both slices - adjust as necessary
				translateFactor : 230,
				// maximum possible angle
				maxAngle : 55,
				// maximum possible scale
				maxScale : 2,
				// slideshow on / off
				autoplay : true,
				// keyboard navigation
				keyboard : true,
				// time between transitions
				interval : 9000,
				// callbacks
				onBeforeChange : function( slide, idx ) { return false; },
				onAfterChange : function( slide, idx ) { return false; }
			};			
				var Page = (function() {

					var $nav = $( '#nav-dots > span' ),
						slitslider = $( '#slider' ).slitslider( {
							onBeforeChange : function( slide, pos ) {

								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );

							}
						} ),

						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							$nav.each( function( i ) {
							
								$( this ).on( 'click', function( event ) {
									
									var $dot = $( this );
									
									if( !slitslider.isActive() ) {

										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									
									}
									
									slitslider.jump( i + 1 );
									return false;
								
								} );
								
							} );

						};

						return { init : init };

				})();

				Page.init();


			
			});
		</script>
	</body>
</html>