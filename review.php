<!DOCTYPE html>
<html>
<head>
    <title>Student Review Page</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Student Review Page</h1>

    <?php
    // Database configuration
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "tpc";

    // Create a connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch reviews from the database
    $sql = "SELECT * FROM reviews";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display each review
        while ($row = $result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
            echo "<p><strong>Course:</strong> " . $row["course"] . "</p>";
            echo "<p><strong>Review:</strong> " . $row["review"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No reviews found.</p>";
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $course = $_POST["course"];
        $review = $_POST["review"];

        // Insert the submitted data into the database
        $insertSql = "INSERT INTO reviews (name, course, review) VALUES ('$name', '$course', '$review')";

        if ($conn->query($insertSql) === TRUE) {
            echo "<p>Review submitted successfully.</p>";
        } else {
            echo "<p>Error submitting the review: " . $conn->error . "</p>";
        }
    }

    // Close the database connection
    $conn->close();
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required><br><br>

        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
