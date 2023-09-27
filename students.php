<?php
$page_title = "Students";
include('./header.php');
?>

<div class="container p-5">
    <div class="title text-4">
        <h1>Registered Students</h1>
    </div>

    <table class="table mt-4">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.R.</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">PRN</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Year</th>
                <th scope="col">Dept.</th>
                <th scope="col">Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stmt = $conn->prepare("SELECT * FROM students_records");
                $stmt->execute();
                $result = $stmt->get_result();
                $i = 1;

                while($row = $result->fetch_assoc())
                {
            ?>
            <tr>
                <th scope="row"><?php echo $i; $i++; ?></th>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['prn']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['year']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><a href ="<?php echo $row['resume']; ?>" attributes-list download > Download </a> </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
 
</div>