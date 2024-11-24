<?php
// Start the session to store form data and messages
session_start();

// Check if the form has been submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    // Get the form data, ensuring that it is safe to use by removing any unnecessary spaces
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));

    // Check if the name and email fields are filled in
    if (!empty($name) && !empty($email)) {
        // Store a success message in the session if the form is valid
        $_SESSION['message'] = "Thanks for signing up, $name!";
        $_SESSION['message_color'] = 'green'; // Success color
    } else {
        // Store an error message if the form is incomplete
        $_SESSION['message'] = "Please fill in all fields.";
        $_SESSION['message_color'] = 'red'; // Error color
    }
}

// Check if the "Load More" button was clicked
if (isset($_POST['load_more'])) {
    // Append additional content to the session for later display
    $_SESSION['dynamic_content'] .= "<p>Here is some additional content for you to explore. Stay tuned for more!</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoQuest Page 1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> <!-- Link to jQuery -->

    <style>
        /* Basic styling for the whole page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header Section */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        
        header .logo img {
            width: 150px;
        }

        /* Navigation bar styling */
        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Main Content Styling */
        .main-content {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .left-panel, .right-panel {
            width: 20%;
            background-color: #ddd;
            padding: 10px;
        }

        .middle-panel {
            width: 55%;
            background-color: #fff;
            padding: 20px;
        }

        /* Styling for Tabs */
        .tabs {
            margin-bottom: 10px;
        }

        .tab-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .tab-button.active {
            background-color: #45a049;
        }

        .tab-content {
            display: none;
            margin-top: 20px;
        }

        .tab-content.active {
            display: block;
        }

        /* Form and content box styling */
        .content-box {
            background-color: #e9ecef;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
        }

        .content-box input, .content-box button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .content-box button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        /* Footer Styling */
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            position: absolute;
            width: 100%;
            bottom: 0;
            text-align: center;
        }

        footer .footer-logo {
            font-size: 24px;
            font-weight: bold;
        }

        footer address {
            margin-top: 10px;
        }

        footer .footer-columns {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        footer .footer-columns div {
            width: 30%;
        }

        footer .footer-columns ul {
            list-style: none;
            padding: 0;
        }

        footer .footer-columns ul li {
            margin-bottom: 5px;
        }

        footer .footer-columns ul li a {
            color: white;
            text-decoration: none;
        }

        footer .footer-columns ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="eco logo.png" alt="EcoQuest Logo"> <!-- Logo Image -->
        </div>
        <nav>
            <ul>
                <!-- Navigation links -->
                <li><a href="#">Link one</a></li>
                <li><a href="#">Link two</a></li>
                <li><a href="#">Link three</a></li>
                <li><a href="#">Link four</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <div class="main-content">
        <div class="left-panel">
            <!-- Options list -->
            <ul>
                <li>Option 1</li>
                <li>Option 2</li>
                <li>Option 3</li>
                <li>Option 4</li>
                <li>Option 5</li>
                <li>Option 6</li>
            </ul>
        </div>

        <div class="middle-panel">
            <!-- Tabs for navigation between content -->
            <div class="tabs">
                <button class="tab-button active" data-tab="tab1">Tab 1</button>
                <button class="tab-button" data-tab="tab2">Tab 2</button>
                <button class="tab-button" data-tab="tab3">Tab 3</button>
            </div>

            <!-- Tab content sections -->
            <div id="tab1" class="tab-content active">
                <p>Content for Tab 1: This section could hold quick access information or options.</p>
            </div>
            <div id="tab2" class="tab-content">
                <p>Content for Tab 2: More detailed descriptions or user instructions.</p>
            </div>
            <div id="tab3" class="tab-content">
                <p>Content for Tab 3: Additional resources or tools.</p>
            </div>

            <!-- Signup Form Section -->
            <div class="content-box">
                <h3>Join the EcoQuest Challenge</h3>
                <!-- Form for user signup -->
                <form method="POST">
                    <!-- Input fields for name and email -->
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <!-- Submit button to sign up -->
                    <button type="submit" name="signup">Sign Up</button>
                </form>

                <!-- Display message based on form submission -->
                <?php
                if (isset($_SESSION['message'])) {
                    // Display success or error message based on the form status
                    echo "<p style='color:" . $_SESSION['message_color'] . "'>" . $_SESSION['message'] . "</p>";
                }
                ?>
            </div>

            <!-- Button to load additional content -->
            <div class="content-box">
                <form method="POST">
                    <button type="submit" name="load_more">Load More Content</button>
                </form>
                <!-- Display dynamic content if available -->
                <?php
                if (isset($_SESSION['dynamic_content'])) {
                    echo $_SESSION['dynamic_content'];
                }
                ?>
            </div>
        </div>

        <div class="right-panel">
            <ul>
                <li>Right Option 1</li>
                <li>Right Option 2</li>
                <li>Right Option 3</li>
                <li>Right Option 4</li>
            </ul>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-logo">Logo</div>
        <address>
            Address: 123 Main Street, City<br>
            State Province, Country
        </address>
        <div class="footer-columns">
            <div>
                <ul>
                    <li><a href="#">Link one</a></li>
                    <li><a href="#">Link two</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="#">Link five</a></li>
                    <li><a href="#">Link six</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="#">Link nine</a></li>
                    <li><a href="#">Link ten</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- JavaScript to toggle tabs -->
    <script>
        $(document).ready(function() {
            // Toggle active class for tabs
            $('.tab-button').click(function() {
                var tabName = $(this).data('tab');
                $('.tab-button').removeClass('active');
                $(this).addClass('active');
                $('.tab-content').removeClass('active');
                $('#' + tabName).addClass('active');
            });
        });
    </script>
</body>
</html>
