<?php
    if(!isset($_GET['id']))
    {
        echo "<script> alert('Unknow Error Occured!!!'); window.history.back(); </script>";
    }
    $title = "Jobs";
    include("./header.php");
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `jobs` WHERE id = ?");
    $stmt->bind_param("i", $id);
    if($stmt->execute())
    {
        //executed
        $result = $stmt->get_result();
        
        
        while($row = $result->fetch_assoc())
        {
            if(empty($row)){ echo "<script> alert('Error while fetching the data!!!'); location.href='./jobs.php';</script>"; }
            $department = $row['department'];
            $companyName = $row['company'];
            $jobDescription = $row['description'];
            $location = $row['location'];
            $campusSelect = $row['campusSelect'];
            $deadline = $row['deadline'];
            $instructions = $row['instructions'];
            $applicationURL = $row['applicationURL'];
            $logoPath = $row['logoPath'];
        }
    }
    else
    {
        echo "<script> alert('Error while fetching the data!!!');</script>";
    }
?>

<!--Main -->
<div class="p-1">
    <a href="./jobs.php" class="btn btn-primary position-fixed"> <i class="bi bi-arrow-left-short"></i> </a>

    <div class="container p-5">
        <div class="card shadow border-primary bg-light">
            <div class="card-header">
                Edit Job
            </div>
            <form class="card-body" action="./backend/edit-job-backend.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" id="id" value="<?php echo $id; ?>" hidden>
                <div class="title text-muted mb-1"> Department </title>
                    <select class="form-select mb-3" aria-label="Default select example" name = "department">
                        <option <?php if($department == "Computer Science & Engineering") { echo "Selected";} ?>>Computer Science & Engineering</option>
                        <option <?php if($department == "Electronic & Telecommunication Engineering") { echo "Selected";} ?>>Electronic & Telecommunication Engineering</option>
                        <option <?php if($department == "Information Technology") { echo "Selected";} ?>>Information Technology</option>
                        <option <?php if($department == "Civil Engineering") { echo "Selected";} ?>>Civil Engineering</option>
                        <option <?php if($department == "Mechanical Engineering") { echo "Selected";} ?>>Mechanical Engineering</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company name" value="<?php echo $companyName; ?>" required>
                        <label for="companyName" class="text-muted">Company name</label>
                    </div>
                    <div class="card p-2 mb-2 bg-light">
                        <label for="" class="text-muted">Company Logo</label>
                        <input type="text" name="oldLogo" id="oldLogo" value="<?php echo $logoPath; ?>" hidden>
                        <img src="<?php echo $logoPath;?>" class="mb-2 border shadow" alt="" width="150px">
                        <input type="file" value="<?php echo $logoPath; ?>" class="form-control" name="companyLogo" id="companyLogo" onChange="checkImageSize()" accept="image/*">
                        
                    </div>
                    <div class="form-floating mb-3">
                        <textarea type="text" name="jobDescription" style="height:100px" class="form-control" id="jobDescription"
                            placeholder="Job Description" required><?php echo $jobDescription; ?></textarea>
                        <label for="JobDescription" class="text-muted">Job Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="location" class="form-control" id="location" placeholder="Location" value="<?php echo $location; ?>" >
                        <label for="location" class="text-muted">Location</label>
                    </div>


                    <select name="campusSelect" class="form-select mb-2" id="campusSelect" onChange="change()">
                        <option <?php if($campusSelect == "On-Campus"){echo "Selected";} ?>>On-Campus</option>
                        <option <?php if($campusSelect == "Off-Campus"){echo "Selected";} ?>>Off-Campus</option>
                    </select>

                    <div class="form-floating mb-3" id="urlForm" style="display:none">
                        <input type="url" name="applicationURL" class="form-control" id="url" placeholder="url" value="<?php echo $applicationURL; ?>" >
                        <label for="url" class="text-muted">Application URL</label>
                    </div>

                    <div class="form-check p-2">
                        <span class="title">Deadline</span>
                        <input type="date" name="deadline" class="border" value="<?php echo $deadline; ?>" style="outline:none; padding:3px; border-radius: 5px;" name=""
                            id="">
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="instructions" type="text" style="height:100px" class="form-control" id="jobDescription"
                            placeholder="Job Description"><?php echo $instructions; ?></textarea>
                        <label for="companyName" class="text-muted">Instructions</label>
                    </div>

                    <Button type="submit" class="btn btn-success">Update</Button>
                    <a href="#" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
function change() {

    if(document.getElementById("campusSelect").value == "Off-Campus")
    {
        document.getElementById("urlForm").style.display = "block";
        document.getElementById("url").required = true;
    }
    else
    {
        document.getElementById("urlForm").style.display = "none";
        document.getElementById("url").required = false;
    }
}

function checkImageSize()
        {
            let file = document.getElementById("companyLogo").files[0];
            let size = file.size;
            let maxSize = 10 * 1024 * 1024;

            if(size > maxSize)
            {
                alert("File size is large");
                document.getElementById("img").value = "";
            }
            else
            {
                alert("file is acceptable");
            }
        }
</script>