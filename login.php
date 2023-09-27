<?php $page_title = "Login";
require('./main-header.php'); ?>
 
<div class="login-container">
    <form method="POST" class="login-form" action="./login-process.php">
        <h1> Login</h1> </br>
        <label>PRN / Username:</label>
        <input type="text" id="prnno" name="username" required placeholder="Enter your PRN Number...">
        <label for="passw">Password:</label>

        <input type="password" id="passw" name="password" required placeholder="Enter your password...">

        <button type="submit" name="login">LOGIN</button>
<hr style="width: 80%;">
<center><small>Don't have any account?</small> <br>
        <a class="anotherBtn" href="register.php">Register Now...</a></center>
    </form>
</div>
