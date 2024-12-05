<?php
    $title = "Trainings";
    include("./header.php");
?>

<!--Main -->
<div class="p-1">
    <a href="./trainings.php" class="btn btn-primary position-fixed"> <i class="bi bi-arrow-left-short"></i> </a>

    <div class="container p-5">
        <div class="card shadow border-primary bg-light">
            <div class="card-header">
                Add a Training on Portal
            </div>
            <form class="card-body" method = "POST" action = "./backend/new-training-backend.php" enctype = "multipart/form-data">
                <div class="title text-muted mb-1"> Department </title>
                    <select class="form-select mb-3" aria-label="Default select example" name="department">
                        <option selected>Computer Science & Engineering</option>
                        <option>Electronic & Telecommunication Engineering</option>
                        <option>Information Technology</option>
                        <option>Mechanical Engineering</option>
                        <option>Civil Engineering</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="trainingTitle" placeholder="Training title" name = "title" required>
                        <label for="companyName" class="text-muted">Training title</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Training image</label>
                        <input class="form-control" type="file"   name="trainingImg" id = "trainingImg" onChange = "checkImageSize()">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea type="text" style="height:100px" class="form-control" id="jobDescription"
                            placeholder="Job Description" name="description" required></textarea>
                        <label for="JobDescription" class="text-muted">Training Description</label>
                    </div>

                    <select class="form-select mb-2" id="modeSelect" onChange="change()" name="mode">
                        <option selected value="Offline">Offline</option>
                        <option value="Online">Online</option>
                    </select>

                    <div class="form-floating mb-3" id="urlForm" style="display:none">
                        <input type="url" class="form-control" id="url" placeholder="url" name="url">
                        <label for="url" class="text-muted">Training URL</label>
                    </div>
                    <div class="form-floating mb-3" id="locationForm" style="display:block">
                        <input type="text" class="form-control" id="trainingLocation" placeholder="location" name="location" required>
                        <label for="trainingLocation" class="text-muted">Training Location</label>
                    </div>

                    <div class="form-check p-2">
                        <span class="title">Date</span>
                        <input type="date" class="border" style="outline:none; padding:3px; border-radius: 5px;" name="date"
                            id="" required>
                    </div>

                    <button type="Submit" href="#" class="btn btn-success">Add Training</button>
                    <a href="./trainings.php" class="btn btn-danger">Cancel</a>
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
    function checkImageSize()
        {
            let file = document.getElementById("trainingImg").files[0];
            let size = file.size;
            let maxSize = 10 * 1024 * 1024;

            if(size > maxSize)
            {
                alert("File size is large");
                document.getElementById("trainingImg").value = null;
            }
            else
            {
                alert("file is acceptable");
            }
        }

</script>