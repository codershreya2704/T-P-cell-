<?php
session_start();
    if(isset($_SESSION['username']))
    {
        if($_SESSION['username'] == "Admin")
        {
            header("Location: ./tpo_cell/");
        }
        else
        {
            header("Location: ./student/");
        }
    }
    else
    {
        // echo "No Session is available";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?php echo $page_title; ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="new.css">
    <script src='main.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="overflow-x: hidden;">
    <div class="container1" style="overflow: hidden;">

        <div class="header">

            <a href="index.php"><img src="images/JJMlogo.png"></a>
            <h1>Training and Placement Cell    </h1>
        </div>
        <div class="navbar">
            <a href="index.php" style="<?php if($page_title == "Home"){echo 'background:rgb(48, 48, 101);';} ?>;">Home</a>

            <div class="dropdown">
                <button class="dropbtn"  style="<?php if($page_title == "Aptitude" || $page_title == "Interview" || $page_title == "Coding"){echo 'background:rgb(48, 48, 101);';} ?>;">Training
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="apt.php">Aptitude</a>

                    <a href="interview.php">Interview</a>
                    <a href="coding.php">Coding</a>

                </div>
            </div>
            <!-- <a href="cse.php">Student login</a> -->
            <!-- <a href="tpo.php">TPO login</a> -->
            <a href="contact.php"  style="<?php if($page_title == "Contact Us"){echo 'background:rgb(48, 48, 101);';} ?>;">Contact Us</a>
            <a id="login" href="login.php"  style="<?php if($page_title == "Login" || $page_title == "Register"){echo 'background:rgb(48, 48, 101);';} ?>;">Login</a>
        </div>

    </div>