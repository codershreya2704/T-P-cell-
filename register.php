<?php $page_title = "Register";
require('./main-header.php'); ?>

<div class="login-container">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <form method="POST" class="register-form" action="login-process.php" enctype="multipart/form-data">
        <h1> Register</h1> </br>
        <label for="name">First Name:</label>
        <input type="text" name="fname" required>
        <label for="name">Last Name:</label>
        <input type="text" name="lname" required>

        
        <label for="AY">Academic Year: </label>
        <select name="year" id="year" required>
            <option>Select an option</option>
            <option value="FY">First Year</option>
            <option value="SY">Second Year</option>
            <option value="BE">Final Year</option>
        </select>
        <label for="department">Department: </label>
        <select name="department" id="department" required>
            <option>Select an option</option>
            <option>Computer Science & Engineering</option>
            <option>Information Technology</option>
            <option>Mechanical Engineering</option>
            <option>Civil Enginerring</option>
            <option>Electronics and Telecommunication Engineering</option>
        </select>
        <label for="file">Resume:</label>
        <input type="file" name="resume" accept=".pdf" required>
        <label for="prn">PRN Number:</label>
        <input type="number" name="prn" id="prn" required>    
        <label for="contact">Contact:</label>
        <input type="number" name="contact" id="con" required>
        <label>Create Password:</label>
        <input type="password" name="password" id="pass" required>
        <i class="fas fa-eye" id="pass-toggle"></i>
        <label for="cpass">Confirm Password:</label>
        <input type="password" name="confirm_password" id="cpass" required>
        <i class="fas fa-eye" id="cpass-toggle"></i>


        <button type="submit" name="register">Register</button>

        <hr style="width: 80%;">
        <center><small>Already have an account?</small> <br>
            <a class="anotherBtn">Login Now...</a>
        </center>
    </form>
</div>
<!-- 
     <div class="login-container" style="background: black;">
         <form class="cseform" name="registrationForm" method="POST" action="cse.php" enctype="multipart/form-data" onsubmit="return validateForm();">
             <h1>Student Registration</h1>
             <div class="stu">

                 <div class="left">
                     <label for="name">First Name:</label>
                     <input type="text" name="fname" required><br><br>
                 </div>
                 <div class="right">
                     <label for="name">Last Name:</label>
                     <input type="text" name="lname" required><br><br>
                 </div>
                 <label for="sex">Gender:</label>
                 <input type="radio" name="sex" id="male" value="male" required>
                 <label for="male">Male</label>
                 <input type="radio" name="sex" id="female" value="female" required>
                 <label for="female">Female</label> <br><br>
                 <label for="AY">Academic Year: </label>
                 <select name="year" id="year" required>
                     <option>Select an option</option>
                     <option value="FY">First Year</option>
                     <option value="SY">Second Year</option>
                     <option value="TY">Third Year</option>
                     <option value="BE">Final Year</option>
                 </select><br>
                 <label for="AY">Department: </label>
                 <select name="year" id="year" required>
                     <option>Select an option</option>
                     <option value="FY">ComputerScience and Engineering</option>
                     <option value="SY">Information Technology</option>
                     <option value="TY">Mechanical Engineering</option>
                     <option value="BE">Civil Enginerring</option>
                     <option value="BE">Electronics and Telecommunication Enginerring</option>
                 </select><br>
                 <label for="file">Resume:</label>
                 <input type="file" name="pdf_file" accept=".pdf" required><br><br>

                 <label for="prn">PRN Number:</label>
                 <input type="text" name="prn" id="prn" required>
                 <label for="contact">Contact:</label>
                 <input type="text" name="con" id="con" required>


                 <label>Create Password:</label>
                 <input type="password" name="pass" id="pass" required>
                 <i class="fas fa-eye" id="pass-toggle"></i>

                 <label for="cpass">Confirm Password:</label>
                 <input type="password" name="cpass" id="cpass" required>
                 <i class="fas fa-eye" id="cpass-toggle"></i>

                 <div class="sbtn">
                     <button type="submit" name="submit">SUBMIT</button>
                 </div>
             </div>
         </form>
     </div>

     <div class="frm2">
         <p>Already Registered?</p>
         <form method="POST">
             <h1>Student Login</h1>
             <label>PRN Number:</label>
             <input type="text" id="prnno" name="prnno" required>
             <label for="passw">Password:</label>

             <input type="password" id="passw" name="passw" required>
             <i class="fas fa-eye" id="passw-toggle"></i>

             <button type="submit" name="login">LOGIN</button>
     </div>
     </form>
 </body>

 </html>
 <script>
     function validateForm() {
         var fname = document.forms["registrationForm"]["fname"].value;
         var lname = document.forms["registrationForm"]["lname"].value;
         var sex = document.forms["registrationForm"]["sex"].value;
         var year = document.forms["registrationForm"]["year"].value;
         var prn = document.forms["registrationForm"]["prn"].value;
         var pass = document.forms["registrationForm"]["pass"].value;
         var cpass = document.forms["registrationForm"]["cpass"].value;
         var pdf_file = document.forms["registrationForm"]["pdf_file"].value;

         if (fname == "") {
             alert("First Name must be filled out");
             return false;
         }

         if (lname == "") {
             alert("Last Name must be filled out");
             return false;
         }

         if (sex == "") {
             alert("Please select your Gender");
             return false;
         }


         if (prn == "") {
             alert("PRN Number must be filled out");
             return false;
         }

         if (pass == "") {
             alert("Password must be filled out");
             return false;
         }

         if (pass !== cpass) {
             alert("Password and Confirm Password do not match");
             return false;
         }

         if (pdf_file == "") {
             alert("Please upload your Resume (PDF)");
             return false;
         }

         return true;
     }
 </script>

 <script>
     // Function to toggle password visibility
     function togglePasswordVisibility(inputId) {
         const input = document.getElementById(inputId);
         const icon = document.getElementById(inputId + '-toggle');

         if (input.type === 'password') {
             input.type = 'text';
             icon.classList.remove('fa-eye');
             icon.classList.add('fa-eye-slash');
         } else {
             input.type = 'password';
             icon.classList.remove('fa-eye-slash');
             icon.classList.add('fa-eye');
         }
     }

     // Event listeners for password toggle icons
     document.getElementById('pass-toggle').addEventListener('click', function() {
         togglePasswordVisibility('pass');
     });

     document.getElementById('cpass-toggle').addEventListener('click', function() {
         togglePasswordVisibility('cpass');
     });
     document.getElementById('passw-toggle').addEventListener('click', function() {
         togglePasswordVisibility('passw');
     });

     document.getElementById('passw-toggle').addEventListener('click', togglePasswordVisibility);
 </script> -->
 <script>
     // Function to toggle password visibility
     function togglePasswordVisibility(inputId) {
         const input = document.getElementById(inputId);
         const icon = document.getElementById(inputId + '-toggle');

         if (input.type === 'password') {
             input.type = 'text';
             icon.classList.remove('fa-eye');
             icon.classList.add('fa-eye-slash');
         } else {
             input.type = 'password';
             icon.classList.remove('fa-eye-slash');
             icon.classList.add('fa-eye');
         }
     }

     // Event listeners for password toggle icons
     document.getElementById('pass-toggle').addEventListener('click', function() {
         togglePasswordVisibility('pass');
     });

     document.getElementById('cpass-toggle').addEventListener('click', function() {
         togglePasswordVisibility('cpass');
     });
     document.getElementById('passw-toggle').addEventListener('click', function() {
         togglePasswordVisibility('passw');
     });

     document.getElementById('passw-toggle').addEventListener('click', togglePasswordVisibility);
 </script> 