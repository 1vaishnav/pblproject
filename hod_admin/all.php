<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>
<div id="layoutSidenav_content">
    <?php
    include('connect.php');
    $query = "SELECT * FROM request";
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
                                <th>Action</th>
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
                                    <form method="POST" action="view.php" style="display:inline;">
                                        <input type="hidden" name="entry_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="view-btn">View</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="approved.php" style="display:inline;">
                                        <input type="hidden" name="entry_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="approve-btn">Approve</button>
                                    </form>
                                    <form method="POST" action="delete.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                        <input type="hidden" name="entry_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="delete-btn">Delete</button>
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
