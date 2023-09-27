<?php
    $title = "Announcements";
    include("./header.php");
?>

<!--Main -->
<div class="p-1">
    <a href="./announcements.php" class="btn btn-primary position-fixed"> <i class="bi bi-arrow-left-short"></i> </a>

    <div class="container p-5">
        <div class="card shadow border-primary bg-light">
            <div class="card-header">
                Create announcement
            </div>
            <form class="card-body" method = "POST" action="./backend/new-announcement-backend.php">
                <div class="title text-muted mb-1"> Department </title>
                <select class="form-select mb-3" aria-label="Default select example" name="department">
                        <option selected>Computer Science & Engineering</option>
                        <option>Electronic & Telecommunication Engineering</option>
                        <option>Information Technology</option>
                        <option>Mechanical Engineering</option>
                        <option>Civil Engineering</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="announcementTitle" placeholder="Announcement title" name="title" required>
                        <label for="announcementTitle" class="text-muted">Announcement Title</label>
                    </div>
 
                    <div class="form-floating mb-3">
                        <textarea type="text" style="height:100px" class="form-control" id="announcementDescription"
                            placeholder="Announcement Description" name="description" required></textarea>
                        <label for="announcementDescription" class="text-muted">Announcement Description</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="other" placeholder="Other" name="other">
                        <label for="other" class="text-muted">Other</label>
                    </div>
                    

                    <Button type="submit" class="btn btn-success">Create</Button>
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