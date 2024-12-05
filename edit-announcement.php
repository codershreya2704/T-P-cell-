<?php
    if(!isset($_GET['id']))
    {
        echo "<script> alert('Unknow Error Occured!!!'); window.history.back(); </script>";
    }
    $title = "Announcements";
    include("./header.php");
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `announcements` WHERE id = ?");
    $stmt->bind_param("i", $id);
    if($stmt->execute())
    {
        //executed
        $result = $stmt->get_result();
        
        
        while($row = $result->fetch_assoc())
        {
            if(empty($row)){ echo "<script> alert('Error while fetching the data!!!'); location.href='./jobs.php';</script>"; }
            $department = $row['department'];
            $title = $row['title'];
            $description = $row['description'];
            $other = $row['other'];
        }
    }
    else
    {
        echo "<script> alert('Error while fetching the data!!!');</script>";
    }
?>
<!--Main -->
<div class="p-1">
    <a href="./announcements.php" class="btn btn-primary position-fixed"> <i class="bi bi-arrow-left-short"></i> </a>

    <div class="container p-5">
        <div class="card shadow border-primary bg-light">
            <div class="card-header">
                Edit Announcement
            </div>
            <form class="card-body" action="./backend/edit-announcement-backend.php" method="POST">
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
                        <input type="text" class="form-control" id="announcementTitle" placeholder="Announcement title" value="<?php echo $title; ?>" name="title" required>
                        <label for="announcementTitle" class="text-muted">Announcement Title</label>
                    </div>
 
                    <div class="form-floating mb-3">
                        <textarea type="text" style="height:100px" class="form-control" id="announcementDescription"
                            placeholder="Announcement Description" name="description" required><?php echo $description; ?></textarea>
                        <label for="announcementDescription" class="text-muted">Announcement Description</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="other" placeholder="Other" value="<?php echo $other; ?>" name="other">
                        <label for="other" class="text-muted">Other</label>
                    </div>
                    

                    <Button type="submit" class="btn btn-success">Update</Button>
                    <a href="./announcements.php" class="btn btn-danger">Cancel</a>
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