<?php

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $year = $_POST['year'];
        $department = $_POST['department'];
        $prn = $_POST['prn'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        
        $confirm_password = $_POST['confirm_password'];

        if($password != $confirm_password)
        {
            echo "<script>  alert('Password matching failed!!!'); history.back();  </script>";
        }

        // $password = password_hash($password, PASSWORD_DEFAULT);
        if(isset($_FILES["resume"]["name"]) && !empty($_FILES["resume"]["name"])) 
        {
            $target_file = "./resume/" . basename($_FILES["resume"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
            // Check if image file is a actual image or fake image

            if(!file_exists($target_file))
            {
                $target = "./resume/" .$prn . $_FILES["resume"]["name"];
                move_uploaded_file($_FILES["resume"]["tmp_name"], $target);
            }
            else
            {
                echo "<script>  alert('Please upload the file with different name!!'); history.back();  </script>";    
            }
        }
        else
        {
            echo "<script>  alert('Invalid File!!'); history.back();  </script>";
            
        }

        include('./dbConnection.php');

        $stmt = $conn->prepare("INSERT INTO `students_records` (fname, lname, `year`, department, `resume`, prn, contact, `password`) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssiss", $fname, $lname, $year, $department, $target, $prn, $contact, $confirm_password);

        if($stmt->execute())
        {
            echo "<script> alert('Registration completed successfully, You can now Login to the Portal.'); window.location.href = './login.php';</script>";
        }
        else
        {
            $error = mysqli_error($conn);
            if(str_contains($error, "Duplicate entry"))
            {
                echo "<script> alert('Account already exist!!'); window.location.href = './login.php';</script>";
                // header("Location: ./login.php");
            }
        }
        
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']))
    {
        $login_username = $_POST['username'];
        $login_password = $_POST['password'];

        if($login_username == "Admin" && $login_password == "admin")
        {
            session_start();
            $_SESSION['username'] = "Admin";
            header("Location: ./tpo_cell/");
        }
        else
        {
            require('./dbConnection.php');

            $stmt = $conn->prepare("SELECT prn, `password` FROM `students_records` WHERE prn = ?");
            $stmt->bind_param("i", $login_username);
            $stmt->execute();

            $result = $stmt->get_result();
            if($result->num_rows <= 0)
            {
                echo "<script> alert('Invalid User!!'); history.back(); </script>";
            }
            else
            {
                $row = $result->fetch_assoc();
                $dbPassword = $row['password'];

                if($dbPassword == $login_password)
                {
                    session_start();
                    $_SESSION['username'] = $login_username;

                    header("Location: ./student/"); 
                }
                else
                {
                    echo "<script> alert('Invalid Password!!'); history.back(); </script>";
                }

            }
        }
    }
    else
    {
        echo "Please go back!!";
    }
    

?>