<?php
    $page_title = "Jobs";
    include("./header.php"); 
    include("../dbConnection.php");
?>
<!--Main -->
<div class="container-fluid p-2">

    <!-- Collapse -->
    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            <i class="bi bi-funnel"> </i>
        </a>
        <a href="./add-job.php" class="btn btn-primary" type="button">
            Add New Job

        </a>
    </p>
    





    <!-- Jobs Card -->
    <div class="container p-2 pt-5 pb-5">
        <?php
        // Fetching jobs
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $department = $_POST["filter_department"];
        }
        else { $department = "All"; } 

        ?>
    <div class="collapse pb-4" id="collapseExample">
        <form class="card card-body bg-light" method="POST" action="./jobs.php">
            <!-- Filter -->


            <select class="form-select mb-2" name="filter_department" aria-label="Default select example">
                    <option <?php if($department == "All"){echo "Selected";} ?>>All</option>
                    <option <?php if($department == "Computer Science & Engineering"){echo "Selected";} ?>>Computer Science & Engineering</option>
                    <option <?php if($department == "Electronic & Telecommunication Engineering"){echo "Selected";} ?>>Electronic & Telecommunication Engineering</option>
                    <option <?php if($department == "Civil Engineering"){echo "Selected";} ?>>Civil Engineering</option>
                    <option <?php if($department == "Mechanical Engineering"){echo "Selected";} ?>>Mechanical Engineering</option>
                    <option <?php if($department == "Information Technology"){echo "Selected";} ?>>Information Technology</option>
                </select>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-success " type="submit">Apply Filter</button>
            </div>
        </form>
    </div>
        <?php
        if($department == "All")
        {
          $stmt = $conn->prepare("SELECT * FROM `jobs`");
        }
        else 
        { 
          $stmt = $conn->prepare("SELECT * FROM `jobs` WHERE `department` = ?");
          $stmt->bind_param("s", $department);
        }
 
        
        if($stmt->execute())
        {
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc())
            {
                if(empty($row)){echo "<tt class='text-muted fs-3 position-absolute top-50 start-50 translate-middle' >No jobs to display</tt>"; }
              ?>

        <div class="card mb-4 shadow border-success">
            <h5 class="card-header"><?php echo $row["department"]; ?></h5>
            <div class="card-body">
                <h5 class="card-title">
                    <img src=<?php echo $row["logoPath"]; ?> class="img-fluid" alt="..." height="50px" width="80px">
                    <?php echo $row["company"]; ?>
                </h5>
                <br>
                <p class="fw-noraml float-right" style="position: absolute; left:2%; "> <?php echo $row["campusSelect"]; ?> </p><br><br>
                <p class="fw-light text-muted" style="position: absolute; left:2%; "> <?php echo $row["location"]; ?> </p><br><br>
                <p class="fw-light text-muted" style="position: absolute; left:2%; "> <a href="<?php echo $row["applicationURL"]; ?>" class="btn btn-success">Apply Now</a> </p><br><br>
                <p class="card-text" style="position: absolute; left:2%; "><?php echo $row["description"]; ?></p><br><br>
                <a href="./edit-job.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-warning"><i class="bi bi-pencil"> </i></a>
                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteJobModal<?php echo $row['id']; ?>"><i
                        class="bi bi-trash"></i></a>
            </div>
            <div class="card-footer text-muted">
                Deadline: <?php echo $row["deadline"]; ?>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteJobModal<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Remove this job from portal?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a href="./backend/delete.php?id=<?php echo $row['id']; ?>&toDelete=jobs" type="button" class="btn btn-primary">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        }
        else
        {
          echo "Unable to fetch jobs";
        }

      ?>

    </div>
</div>

<!--Footer -->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>