<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>
<div id="layoutSidenav_content">
    <?php
    $conn = new mysqli('localhost', 'root', '', 'student');
    $query = "SELECT * FROM request WHERE repair_type = 'Carpentry_Related_Work'";
    $query_run = mysqli_query($conn, $query);
    $rows = array();
    
    if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_array($query_run)) {
            $rows[] = $row;
        }
        $rows = array_reverse($rows); // Display newest entries first
    }
    ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Carpentry Section</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Carpentry Section
                </div>
                
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Status</th>
                                <th>Details</th>
                                <th>View Application</th>
                                <th>Send</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($rows)) {
                            foreach ($rows as $row) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['repair_details']; ?></td>
                                <td>
                                    <form method="POST" action="view.php">
                                        <input type="hidden" name="entry_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="delete-btn">View</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="send_email.php">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="institute_office" value="<?php echo htmlspecialchars($row['institute_office']); ?>">
                                        <input type="hidden" name="department" value="<?php echo htmlspecialchars($row['department']); ?>">
                                        <input type="hidden" name="contact_name" value="<?php echo htmlspecialchars($row['contact_name']); ?>">
                                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
                                        <input type="hidden" name="mobile_no" value="<?php echo htmlspecialchars($row['mobile_no']); ?>">
                                        <input type="hidden" name="repair_type" value="<?php echo htmlspecialchars($row['repair_type']); ?>">
                                        <input type="hidden" name="repair_details" value="<?php echo htmlspecialchars($row['repair_details']); ?>">
                                        <input type="hidden" name="status" value="<?php echo htmlspecialchars($row['status']); ?>">
                                        <button type="submit" class="send-btn">Send</button>
                                    </form>
                                </td>
                            </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="5">NO RECORD FOUND</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include('footer.php'); ?>
