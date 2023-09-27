<?php 
  // Databse connection
  include("dbConnection.php");
  
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $title; ?></title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous" />
        <style>

        </style>
        
    </head>
    <body>
<!--Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(48, 48, 101);">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">TnP Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                  <a class="nav-link <?php if($title == "Jobs"){echo "active";} ?>" aria-current="page" href="./jobannounce.php">Jobs</a>
                </li>
               
              </ul>
              <ul class="navbar-nav ms-auto">
                    <?php if (!empty($loggedInPRN)) { ?>
                        <li class="nav-item">
                            <span class="nav-link">Logged in as: <?php echo $loggedInPRN; ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php?logout=true">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    <?php } ?>
                </ul>

              <form class="d-flex">
             <!-- <button type="button" class="btn btn-primary position-relative">
                <i class="bi bi-bell-fill"></i><span class="badge bg-secondary">4</span>!-->
              
              </button>
      </form>
            </div>
          </div>
        </nav>
<!-- Navbar End -->