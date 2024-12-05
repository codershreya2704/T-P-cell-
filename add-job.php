<?php
    $title = "Jobs";
    include("./header.php");
?>

<!--Main -->
<div class="p-1">
    <a href="./jobs.php" class="btn btn-primary position-fixed"> <i class="bi bi-arrow-left-short"></i> </a>

    <div class="container p-5">
        <div class="card shadow border-primary bg-light">
            <div class="card-header">
                Add a Job on Portal
            </div>
            <form class="card-body" action = "./backend/add-job-backend.php" method="POST" enctype = "multipart/form-data">
                <div class="title text-muted mb-1"> Department </title>
                    <select class="form-select mb-3" aria-label="Default select example" name="department">
                        <option selected>Computer Science & Engineering</option>
                        <option>Electronics and Telecommunication Engineering</option>
                        <option>Electrical Engineering</option>
                        <option>Information Technology</option>
                        <option>Civil Engineering</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="companyName" required name="companyName" placeholder="Company name">
                        <label for="companyName" class="text-muted">Company name</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Company logo</label>
                        <input class="form-control" onChange="checkImageSize()" name="companyLogo" type="file" id="companyLogo">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea type="text" required style="height:100px" class="form-control" name="jobDescription" id="jobDescription"
                            placeholder="Job Description"></textarea>
                        <label for="JobDescription" class="text-muted">Job Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                        <label for="location" class="text-muted">Location</label>
                    </div>


                    <select class="form-select mb-2" id="campusSelect" name="campusSelect" onChange="change()">
                        <option>On-Campus</option>
                        <option>Off-Campus</option>
                    </select>

                    <div class="form-floating mb-3" id="urlForm" style="display:block">
                        <input type="url" class="form-control" name="applicationURL"id="url" placeholder="url">
                        <label for="url" class="text-muted">Application URL</label>
                    </div>

                    <div class="form-check p-2">
                        <span class="title">Deadline</span>
                        <input type="date" required class="border" name="date" style="outline:none; padding:3px; border-radius: 5px;" name=""
                            id="">
                    </div>

                    <div class="form-floating mb-3">
                        <textarea type="text" style="height:100px" name="instructions" class="form-control" id="instructions"
                            placeholder="Instructions"></textarea>
                        <label for="instructions" class="text-muted">Instructions</label>
                    </div>

                    <button class="btn btn-success" type="submit">Add Job</button>
                    <a href="./jobs.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->



<!-- 

<script>
function change() {

    if (document.getElementById("campusSelect").value == "Off-Campus") {
        document.getElementById("urlForm").style.display = "block";
        document.getElementById("url").required = true;
    } else {
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
                document.getElementById("companyLogo").value = null;
            }
            else
            {
                alert("file is acceptable");
            }
        }
</script> -->