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
            if (!empty($params['users'])) {
                $count = 0;
                foreach ($users as $row) {
                    $count++;
            ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row["Reg No."]; ?></td>
                        <td><?php echo $row["Student Name"]; ?></td>
                        <td><?php echo $row["Email"]; ?></td>
                        <td><?php echo $row["Course Name"]; ?></td>
                        <td><?php echo $row["Registration Date"]; ?></td>
                        <td><?php echo $row["Graduation Date"]; ?></td>
                        <td class="btn-group">
                            <a href="./edit.php?studentid=<?php echo $row["Reg No."]; ?>&coursename=<?php echo $row["Course Name"]; ?>" class="btn btn-primary btn-sm ms-2">Update</a>
                            <a href="./edit.php?studentid=<?php echo $row["Reg No."]; ?>&coursename=<?php echo $row["Course Name"]; ?>" class="btn btn-danger btn-sm">Delete</a>
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