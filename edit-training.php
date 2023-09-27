<?php
    if(!isset($_GET['id']))
    {
        echo "<script> alert('Unknow Error Occured!!!'); window.history.back(); </script>";
    }
    $title = "Trainings";
    include("./header.php");
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `trainings` WHERE id = ?");
    $stmt->bind_param("i", $id);
    if($stmt->execute())
    {
        //executed
        $result = $stmt->get_result();
        
        
        while($row = $result->fetch_assoc())
        {
            if(empty($row)){ echo "<script> alert('Error while fetching the data!!!'); location.href='./jobs.php';</script>"; }
            $department = $row['department'];
            $training_title = $row['title'];
            $trainingImg = $row['img'];
            $description = $row['description'];
            $mode = $row['mode'];
            $location = $row['location'];
            $url = $row['url'];
            $date = $row['date'];
        }
    }
    else
    {
        echo "<script> alert('Error while fetching the data!!!');</script>";
    }
?>

<!--Main -->
<div class="p-1">
    <a href="./trainings.php" class="btn btn-primary position-fixed"> <i class="bi bi-arrow-left-short"></i> </a>

    <div class="container p-5">
        <div class="card shadow border-primary bg-light">
            <div class="card-header">
                Edit Training
            </div>
            <form class="card-body" method = "POST" action = "./backend/edit-training-backend.php" enctype="multipart/form-data">
                <input type="text" value="<?php echo $id; ?>" hidden name="id">
                <div class="title text-muted mb-1"> Department </title>
                <select class="form-select mb-3" aria-label="Default select example" name = "department">
                        <option <?php if($department == "Computer Science & Engineering") { echo "Selected";} ?>>Computer Science & Engineering</option>
                        <option <?php if($department == "Electronic & Telecommunication Engineering") { echo "Selected";} ?>>Electronic & Telecommunication Engineering</option>
                        <option <?php if($department == "Information Technology") { echo "Selected";} ?>>Information Technology</option>
                        <option <?php if($department == "Civil Engineering") { echo "Selected";} ?>>Civil Engineering</option>
                        <option <?php if($department == "Mechanical Engineering") { echo "Selected";} ?>>Mechanical Engineering</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="trainingTitle" placeholder="Training title" name="title" value="<?php echo $training_title; ?>" required>
                        <label for="companyName" class="text-muted">Training title</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Training image</label> </br>
                        <input type="text" name="oldImg" id="oldImg" value="<?php echo $trainingImg; ?>" hidden>
                        <img src="<?php echo $trainingImg;?>" class="mb-2 border shadow" alt="" width="150px">
                        <input class="form-control" type="file" id="trainingImg" name="trainingImg">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea type="text" style="height:100px" class="form-control" id="jobDescription"
                            placeholder="Job Description" name="description" required><?php echo $description; ?></textarea>
                        <label for="JobDescription" class="text-muted">Training Description</label>
                    </div>

                    <select class="form-select mb-2" id="modeSelect" onChange="change()" name="mode">
                        <option <?php if($mode == "Offline") { echo "Selected"; } ?>value="Offline">Offline</option>
                        <option <?php if($mode == "Online") { echo "Selected"; } ?>value="Online">Online</option>
                    </select>

                    <div class="form-floating mb-3" id="urlForm" style="display:none">
                        <input type="url" class="form-control" id="url" placeholder="url" name="url" value="<?php echo $url; ?>">
                        <label for="url" class="text-muted">Training URL</label>
                    </div>
                    <div class="form-floating mb-3" id="locationForm" style="display:block">
                        <input type="text" class="form-control" require id="trainingLocation" placeholder="location" name="location" value = "<?php echo $location; ?>">
                        <label for="trainingLocation" class="text-muted">Training Location</label>
                    </div>

                    <div class="form-check p-2">
                        <span class="title">Date</span>
                        <input type="date" class="border" style="outline:none; padding:3px; border-radius: 5px;" name="date" value = "<?php echo $date; ?>">
                    </div>

                    <Button type="submit" class="btn btn-success">Update</Button>
                    <a href="./training.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->





<script>
function change() {

    if (document.getElementById("modeSelect").value == "Online") {

        document.getElementById("urlForm").style.display = "block";
        document.getElementById("url").required = true;

        document.getElementById("locationForm").style.display = "none";
        document.getElementById("trainingLocation").required = false;
    } else {
        document.getElementById("locationForm").style.display = "block";
        document.getElementById("trainingLocation").required = true;

        document.getElementById("urlForm").style.display = "none";
        document.getElementById("url").required = false;
    }
}
</script>