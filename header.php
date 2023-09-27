<?php if(!isset($_SESSION))
{
  session_start();
}
if(isset($_SESSION['username']))
{
//  echo $_SESSION['username'];
include('../dbConnection.php');
}
else
{
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?php echo $page_title; ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="./new.css">
    <script src='main.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous" />
    
</head>

<body style="overflow-x: hidden;">
    <div class="container1" style="overflow: hidden;">

        <div class="header1">

            <a href="index.php"><img src="../images/JJMlogo.png"></a>
            <h1>TnP Cell - Admin   </h1>
        </div>
    
        <div class="navbar1 w-100">
            <a href="index.php" style="<?php if($page_title == "Home"){echo 'background:rgb(48, 48, 101);';} ?>;">Home</a>
            <a href="./jobs.php"  style="<?php if($page_title == "Jobs"){echo 'background:rgb(48, 48, 101);';} ?>;">Jobs</a>
            <a href="./announcements.php"  style="<?php if($page_title == "Announcements"){echo 'background:rgb(48, 48, 101);';} ?>;">Announcements</a>
            <a href="./trainings.php"  style="<?php if($page_title == "Courses"){echo 'background:rgb(48, 48, 101);';} ?>;">Courses</a>
            <a href="./students.php"  style="<?php if($page_title == "Students"){echo 'background:rgb(48, 48, 101);';} ?>;">Students</a>
            <a id="login" href="logout.php">Logout</a>
        </div>

    </div>