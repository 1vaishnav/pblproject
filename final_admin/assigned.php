<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Send Email</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Send Repair Request ID</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="send_email.php">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST['id']); ?>">
                                        <input type="hidden" name="institute_office" value="<?php echo htmlspecialchars($_POST['institute_office']); ?>">
                                        <input type="hidden" name="department" value="<?php echo htmlspecialchars($_POST['department']); ?>">
                                        <input type="hidden" name="contact_name" value="<?php echo htmlspecialchars($_POST['contact_name']); ?>">
                                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                        <input type="hidden" name="mobile_no" value="<?php echo htmlspecialchars($_POST['mobile_no']); ?>">
                                        <input type="hidden" name="repair_type" value="<?php echo htmlspecialchars($_POST['repair_type']); ?>">
                                        <input type="hidden" name="repair_details" value="<?php echo htmlspecialchars($_POST['repair_details']); ?>">
                                        <input type="hidden" name="status" value="<?php echo htmlspecialchars($_POST['status']); ?>">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="assignee_email" type="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Assignee's Email Address</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="index.php">Return to dashboard</a>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="index.php">Cancel</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
