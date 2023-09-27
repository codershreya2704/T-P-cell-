<?php
    $page_title = "Courses";
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
         <a href="./new-training.php" class="btn btn-primary" type="button">
            New Course

        </a>
    </p>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $department = $_POST['filterDepartment'];
            $mode = $_POST['filterMode'];
        }
        else
        {
            $department = "All";
            $mode = "All";
        }

    ?>
    <div class="collapse" id="collapseExample">
        <form class="card card-body bg-light" method="POST" action="./trainings.php">
            <!-- Filter -->
            <select class="form-select mb-2" aria-label="Default select example" name="filterMode">
                <option <?php if($mode == "All") { echo "Selected";} ?>>All</option>
                <option <?php if($mode == "Online") { echo "Selected";} ?>>Online</option>
                <option <?php if($mode == "Offline") { echo "Selected";} ?>>Offline</option>
            </select>
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




    <!-- Jobs Card -->
    <div class="container center p-2 pt-5 pb-5">
        <div class="row row-cols-1">
            <?php

            if($department == "All") {$dep_query = "department IS NOT NULL"; }
            else{ $dep_query = "department = '$department'";}

            if($mode == "All") {$mode_query = "mode IS NOT NULL"; }
            else{ $mode_query = "mode = '$mode'"; }
            $stmt = $conn->prepare("SELECT * FROM `trainings` WHERE $dep_query AND $mode_query");
            if($stmt->execute())
            {
                $result = $stmt->get_result();
                if($result->num_rows <= 0){ echo "<center><tt class='text-muted fs-3 position-absolute top-50 start-50 translate-middle' >No Courses to display</tt></center>";  }
            
                while($row = $result->fetch_assoc())
                {
                ?>
            <div class="card m-1 col bg-light shadow" style="width: 20rem;">
                <img src=<?php echo $row['img']; ?> class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text text-muted"> <?php echo $row['mode']; ?> </p>
                    <?php
                                if($row['mode'] == "Offline")
                                {
                                    echo "<p text='card-text'> Location:  " . $row['location'] . " </p>";
                                }
                                else
                                {
                                    echo "<p text='card-text'> Link:  " . $row['url'] . " </p>";
                                }
                            ?>
                    <p class="card-text"> Date: <?php echo $row['date']; ?> </p>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <a href="./edit-training.php?id=<?php echo $row['id'];?>" class="btn btn-outline-warning"><i class="bi bi-pencil"></i></a>
                    <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteTrainingModal_<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a>
                </div>
                <div class="card-footer">
                    <?php echo $row['department']; ?>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="deleteTrainingModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Remove this training from portal?  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a href="./backend/delete.php?id=<?php echo $row['id']; ?>&toDelete=trainings" class="btn btn-primary">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            else
            {
                echo "Failed to fetch training records";
            }
        ?>


        </div>
    </div>
</div>


<!--Footer -->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>