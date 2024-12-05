<?php
    // Connectiong to database;

    $servername = "localhost";
    $username = "root";
    $password = "";
    

    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connection Succeed!!";

    // Creating database

    $sql = "CREATE DATABASE IF NOT EXISTS `t&p mgmt system`";
    if ($conn->query($sql) === TRUE) 
    {
      /*echo "Database created successfully";*/
    } else {
      echo "Error creating database: " . $conn->error;
    }

    $conn = new mysqli($servername, $username, $password, "t&p mgmt system");

    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }


    // Creating Table if not exists

    # Announcements 

    $announcement_table = "CREATE TABLE IF NOT EXISTS  `announcements` (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        department VARCHAR(200) NOT NULL,
        title VARCHAR(200) NOT NULL,
        `description` VARCHAR(200) NOT NULL,
        other VARCHAR(200) NOT NULL
        )";

    if ($conn->query($announcement_table) === TRUE)
    {
       /* echo "Announcement table created successfully";*/
    } else {
      echo "Error creating database: " . $conn->error;
    }

    # Jobs 
    $jobs_table = "CREATE TABLE IF NOT EXISTS  `jobs` (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        department VARCHAR(200) NOT NULL,
        company VARCHAR(200) NOT NULL,
        `description` VARCHAR(200) NOT NULL,
        `location` VARCHAR(200) NOT NULL,
        deadline date NOT NULL,
        `instructions` VARCHAR(200) NOT NULL,
        `logoPath` VARCHAR(200) NOT NULL default('img/defaultCompanyLogo.png'),
        `applicationURL` VARCHAR(200) NOT NULL,
        `campusSelect` VARCHAR(200) NOT NULL
        )";

    if ($conn->query($jobs_table) === TRUE)
    {
        /*echo "Jobs table created successfully";*/
    } else {
      echo "Error creating database: " . $conn->error;
    }

    # Trainings 
    $trainings_table = "CREATE TABLE IF NOT EXISTS  `trainings` (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        department VARCHAR(200) NOT NULL,
        title VARCHAR(200) NOT NULL,
        `description` VARCHAR(200) NOT NULL,
        `mode` VARCHAR(200) NOT NULL,
        `date` date NOT NULL,
        `img` VARCHAR(200) NOT NULL,
        `location` VARCHAR(200) NOT NULL,
        `url` VARCHAR(200) NOT NULL
        )";

    if ($conn->query($trainings_table) === TRUE)
    {
       /* echo "Trainings table created successfully";*/
    } else {
      echo "Error creating database: " . $conn->error;
    }

    # Trainings 
    $students_records = "CREATE TABLE IF NOT EXISTS  `students_records` (
      prn INT(11) PRIMARY KEY,
      fname VARCHAR(200) NOT NULL,
      lname VARCHAR(200) NOT NULL,
      `year` VARCHAR(200) NOT NULL,
      `department` VARCHAR(200) NOT NULL,
      `resume` date NOT NULL,
      `password` VARCHAR(200) NOT NULL,
      `contact` VARCHAR(200) NOT NULL,
      )";

  if ($conn->query($trainings_table) === TRUE)
  {
     /* echo "Trainings table created successfully";*/
  } else {
    echo "Error creating database: " . $conn->error;
  }


?>
