<?php
session_start();
include('../include/connect.php'); // Update the path to connect.php

if (strlen($_SESSION['alogin']) == 0) {
    header('location:../index.php');
    exit();
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('Y-m-d H:i:s'); // Use ISO 8601 format for storing datetime

    if (isset($_POST['submit'])) {
        $blogName = $_POST['blogName'];
        $description = $_POST['blogDescription'];
        $escapedescription = mysqli_real_escape_string($con, $description);
        
        // Handle file upload
        $blogImg = $_FILES["blogImg"]["name"];
        $blogImgTmp = $_FILES["blogImg"]["tmp_name"];
        $blogImgPath = "blog_images/" . $blogImg;

        // Ensure the directory exists for uploading images
        if (!file_exists('blog_images')) {
            mkdir('blog_images', 0777, true);
        }

        if(move_uploaded_file($blogImgTmp, $blogImgPath)) {
            $Date = $_POST['creationDate'];
            $creationDateFormatted = date('Y-m-d', strtotime($Date));

            // Insert data into database
            $sql = "INSERT INTO blog (blogName, blogDescription, blogImg, Date) VALUES ('$blogName', '$escapedescription', '$blogImg', '$creationDateFormatted')";
            if(mysqli_query($con, $sql)) {
                $_SESSION['msg'] = "Data Inserted Successfully !!";
            } else {
                $_SESSION['msg'] = "Error: " . mysqli_error($con);
            }
        } else {
            $_SESSION['msg'] = "File upload failed.";
        }
        header('location: add-blogs.php'); // Redirect after form submission
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nap Paints | Admin Panel | Add Blogs</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/NAP.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include('header.php') ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include('menu-bar.php') ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Add Blogs</h5>
                        <div class="card">
                            <div class="card-body">
                                <?php if (isset($_SESSION['msg'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Success:</strong> <?php echo htmlentities($_SESSION['msg']); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['msg']); // Clear the message after displaying ?>
                                <?php } ?>

                                <br />
                                <form name="blog_form" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="blogName" class="form-label">Blog Title</label>
                                        <input type="text" name="blogName" class="form-control" id="blogName" aria-describedby="blogName" required>
                                        <div id="blogName" class="form-text">Insert the Blog Title</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="blogImg" class="form-label">Blog Image</label>
                                        <input type="file" class="form-control-file" id="blogImg" name="blogImg" aria-describedby="blogImg" required>
                                        <div id="blogImg" class="form-text">Insert the blog image</div>
                                    </div>
                                    <div class="mb-3">
                                          <label for="description" class="form-label">Description</label>
                                          <textarea class="form-control" id="blogDescription" name="blogDescription" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                          <label for="date" class="form-label">Date</label>
                                          <input type="date" class="form-control" id="creationDate" name="creationDate" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp;
                                    <button type="reset" name="reset" class="btn btn-danger">Reset</button> &nbsp;
                                    <a class="btn btn-success" href="../blogs/add-blogs.php" role="button">Go Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
