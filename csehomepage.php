<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch registered student data
$filter = $_GET['filter'] ?? ''; // Get the filter value from the URL query parameter
$sql = "SELECT * FROM csestu";
if (!empty($filter)) {
    $sql .= " WHERE prn = '$filter'";
}
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='new.css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src='main.js'></script>
    <script>
        function searchByPRN() {
            var prn = document.getElementById('prnInput').value;
            var url = window.location.href.split('?')[0] + '?filter=' + prn;
            window.location.href = url;
        }
    </script>
</head>
<body>
    <div class="header">
        <h1>Training and Placement Cell</h1>
        <a href="home.php"><img src="images/JJMlogo.png"></a> 
      </div>
      <div class="navbar">
        <a href="home.php">Home</a>
        <a href="news.php">News</a>
        <div class="dropdown">
          <button class="dropbtn">Training 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="apt.php">Aptitude</a>
            <a href="interview.php">Interview</a>
            <a href="#">Coding</a>
          </div>
        </div> 
        <div class="dropdown">
            <button class="dropbtn">Departments 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="cse.php">Computer Science and Engineering</a>
              <a href="it.php">Information Technology</a>
              <a href="mech.php">Mechanical Engineering</a>
              <a href="civil.php">Civil Engineering</a> 
              <a href="etc.php">Electronics and Telecommunication</a>
            </div>
          </div> 
          <a href="#news">Contact Us</a>
      </div>
      <h2>Registered Students</h2>
      <div class="srch">
            <p>Search by PRN:</p>
            <input type="text" id="prnInput" value="<?php echo $filter; ?>">
            <button type="button" onclick="searchByPRN()">Search</button>
        </div>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Academic Year</th>
            <th>PRN Number</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["lname"] . "</td>";
                echo "<td>" . $row["sex"] . "</td>";
                echo "<td>" . $row["year"] . "</td>";
                echo "<td>" . $row["prn"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No registered students found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
