
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $jobTitle = $_POST["jobTitle"];
  $company = $_POST["company"];
  $date= $_POST["date"];
  $category = $_POST["category"];
  $description = $_POST["description"];

  // Validate form data
  $errors = [];

  // Perform additional validation checks as needed
  if (empty($jobTitle)) {
    $errors[] = "Job title is required";
  }

  if (empty($company)) {
    $errors[] = "Company is required";
  }
  if (empty($date)) {
    $errors[] = "date is required";
  }

  if (empty($category)) {
    $errors[] = "Category is required";
  }

  if (empty($description)) {
    $errors[] = "Description is required";
  }

  // Insert data into the database if there are no validation errors
  if (empty($errors)) {
    // Database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "tpc";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database table
    $sql = "INSERT INTO job_announcements (job_title, company,date, category, description) VALUES ('$jobTitle', '$company','$date', '$category', '$description')";

    if ($conn->query($sql) === TRUE) {
      echo '<script type="text/javascript">alert("job announcement successful!");</script>';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } else {
    // Display validation errors
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='new.css'>
    <script src='main.js'></script>
</head>
  <title>Job Announcement Form</title>
<body>
    <div class="header">
        <h1>Training and Placement Cell</h1>
       <a href="home.php"><img src="images/JJMlogo.png"></a>
       <a class="logout-link" href="logout.php"><img src="images/logout.png" ></a>
      </div>
      
      
<!DOCTYPE html>
<html>
<head>
  <title>Job Announcement Form</title>
</head>
<body>
  
<!--<div class="frm3">

  <form  method="POST" action="news.php">
  <h1>Create Job Announcement</h1>
    <label for="jobTitle">Job Title:</label>
    <input type="text" id="jobTitle" name="jobTitle" required><br>

    <label for="company">Company:</label>
    <input type="text" id="company" name="company" required><br>
    <label for="company">Date:</label>
    <input type="date" id="date" name="date" required><br>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
      <div class="op">
      <option value=""><p>Select a category</p></option>
      <option value="IT">Computer Science and Engineering</option>
      <option value="Finance">Mechanical Engineering</option>
      <option value="Sales">Civil Engineering</option>
      <option value="Sales">Electronics and Engineering</option>
      </div>
      <!-- Add more options as needed -->
    </select><br></br>

    <label for="description">Description:</label><br><br>
    <textarea id="description" name="description" required></textarea><br>

    <input type="submit" value="Create">
</form>
</div>
</body>
</html>
