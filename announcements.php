<?php
    $page_title = "Announcements";
    include("./header.php");
?>

<!--Main -->
<div class="container-fluid p-2">

    <!-- Collapse -->
    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            <i class="bi bi-funnel"> </i>
        </a>
         <a href="./new-announcement.php" class="btn btn-primary" type="button">
            New Announcement
        </a>
    </p>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $department = $_POST['filterDepartment'];
        }
        else
        {
            $department = "All";
        }
    ?>
    <div class="collapse" id="collapseExample">
        <form class="card card-body bg-light" method="POST" action="./announcements.php">
            <!-- Filter -->
            <select class="form-select mb-2" aria-label="Default select example" name="filterDepartment">
                <option <?php if($department == "All") { echo "Selected"; } ?>>All</option>
                <option <?php if($department == "Computer Science & Engineering") { echo "Selected"; } ?>>Computer
                    Science & Engineering</option>
                <option <?php if($department == "Electronic & Telecommunication Engineering") { echo "Selected"; } ?>>
                    Electronic & Telecommunication Engineering</option>
                <option <?php if($department == "Civil Engineering") { echo "Selected"; } ?>>Civil Engineering</option>
                <option <?php if($department == "Mechanical Engineering") { echo "Selected"; } ?>>Mechanical Engineering
                </option>
                <option <?php if($department == "Information Technology") { echo "Selected"; } ?>>Information Technology
                </option>
            </select>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-success " type="submit">Apply Filter</button>
            </div>
        </form>
    </div>
<br><br>
<br>
    <div class="container">
        <?php

            if($department == "All") {$dep_query = "department IS NOT NULL"; }
            else{ $dep_query = "department = '$department'";}

            $stmt = $conn->prepare("SELECT * FROM `announcements` WHERE $dep_query");
            if($stmt->execute())
            {
                $result = $stmt->get_result();
                if($result->num_rows <= 0){ echo "<tt class='text-muted fs-3 position-absolute top-50 start-50 translate-middle' >No announcements to display</tt>";  }
            
                while($row = $result->fetch_assoc())
                {
                    
        ?>
        <div class="alert alert-info shadow" role="alert">
            <h4 class="alert-heading"><?php echo $row['title']; ?></h4>
            <br>
            <?php echo $row['description']; ?>
             
            <p class="mb-0"><?php echo $row['other']; ?></p>
            <div class="card-footer mt-2 p-0">
                <p class="text-muted"> <?php echo $row['department']; ?></p>
                </div>
            <a href="./edit-announcement.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> </a>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteAnnouncementModal_<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteAnnouncementModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Remove this announcement from portal?  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a href="./backend/delete.php?id=<?php echo $row['id']; ?>&toDelete=announcements" class="btn btn-primary">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
                }
            }
            else
            {
                echo "Failed to fetch announcements";
            }
        ?>
 

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    </body>

    </html>