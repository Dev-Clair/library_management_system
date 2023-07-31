<!-- views/user/index.php -->
<h1>Registered Users</h1>

<a href="./create.php" class="btn btn-primary btn-sm">Create User</a>

<div class="container table-wrapper">
    <table class="table table-striped table-bordered mt-4">
        <thead class="thead-dark">
            <tr>
                <th>S/n</th>
                <th>Registration No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course Name</th>
                <th>Registration Date</th>
                <th>Graduation Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($users)) {
                $count = 0;
                foreach ($users as $row) {
                    $count++;
            ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row["regNo"]; ?></td>
                        <td><?php echo $row["studentName"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["courseName"]; ?></td>
                        <td><?php echo $row["regDate"]; ?></td>
                        <td><?php echo $row["gradDate"]; ?></td>
                        <td class="btn-group">
                            <a href="./edit.php?studentid=<?php echo $row["regNo."]; ?>&coursename=<?php echo $row["courseName"]; ?>" class="btn btn-primary btn-sm ms-2">Update</a>
                            <a href="./edit.php?studentid=<?php echo $row["regNo."]; ?>&coursename=<?php echo $row["courseName"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="8">No records found.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>