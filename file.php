
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src='main.js'></script>
</head>
<body>
    <div class="header">
        <h1>Training and Placement Cell</h1>
        <a href="home.html"><img src="images/JJMlogo.png"></a> 
      </div>
      <div class="navbar">
        <a href="#home">Home</a>
        <a href="#news">News</a>
        <div class="dropdown">
          <button class="dropbtn">Training 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="apt.html">Aptitude</a>
            <a href="#">Group Discussion</a>
            <a href="#">Interview</a>
            <a href="#">Coding</a>
          </div>
        </div> 
        <div class="dropdown">
            <button class="dropbtn">Departments 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="cse.html">Computer Science and Engineering</a>
              <a href="it.html">Information Technology</a>
              <a href="mech.html">Mechanical Engineering</a>
              <a href="civil.html">Civil Engineering</a> 
              <a href="ee.html">Electrical Engineering</a>
              <a href="stc.html">Electronics and Telecommunication</a>
            </div>
          </div> 
          <a href="#news">Contact Us</a>
          <div class="srch">
            <label>Search</label>
            <i class="bi bi-search"></i>
            <input type="search">
        </div>
      </div>
      <div class="heading"><h1>Welcome to CSE department</h1></div>
<form method="POST" action="file.php" enctype="multipart/form-data">
    <h1>Student Registration</h1>
    <div class="stu">
        <div class="right"> 
            <label for="name">Last Name:</label>
            <input type="text" name="lname"><br><br>
        </div>
        <div class="left">
            <label for="name">First Name:</label>
            <input type="text" name="fname"><br><br>
        </div>
        <label for="sex">Gender:</label>
        <input type="radio" name="sex" id="male" value="male">
        <label for="male">Male</label>
        <input type="radio" name="sex" id="female" value="female">
        <label for="female">Female</label> <br><br>
        <label for="AY">Academic Year: </label>
        <select name="year" id="year">
            <option>Select an option</option>
            <option value="FY">First Year</option>
            <option value="SY">Second Year</option>
            <option value="TY">Third Year</option>
            <option value="BE">Final Year</option>
        </select><br>
        <label for="file">Resume:</label>
        <input type="file" name="pdf_file" accept=".pdf"><br>
        <label for="prn">PRN Number:</label>
        <input type="text" name="prn" id="prn">
        <div class="passleft">
            <label>Create Password:</label>
            <input type="password" name="pass" id="pass">
        </div>
        <label for="cpass">Confirm Password:</label>
        <input type="password" name="cpass" id="cpass">
        <div class="sbtn">
            <button type="submit" name="submit">SUBMIT</button>
        </div>
    </div>
</form>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geeksforgeeks";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $year = $_POST['year'];
    $prn = $_POST['prn'];
    $pass = $_POST['pass'];

    if (isset($_FILES['pdf_file']['name'])) {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $file_path = "./pdf/" . $file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            // Prepare and execute SQL statement
            $sql = "INSERT INTO demo2 (fname, lname, sex, year, pdf_file, prn, pass) 
                    VALUES ('$fname', '$lname', '$sex', '$year', '$file_path', '$prn', '$pass')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }
}

$conn->close();
?>
