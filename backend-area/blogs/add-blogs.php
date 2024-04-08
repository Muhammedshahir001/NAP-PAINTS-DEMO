<?php
session_start();
include('../include/connect.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:../index.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according to the timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $blogName = $_POST['blogName'];
        $blogImg = $_FILES["blogImg"]["name"];
        $description = $_POST['description'];
        $date = $_POST['date']; // Capture date from the form

        // Get the maximum ID from the 'brands' table
        $query = mysqli_prepare($con, "SELECT MAX(id) AS bid FROM `blog`");
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $row = mysqli_fetch_assoc($result);
        $maxId = $row['bid'] + 1; // Increment the max ID by 1
        mysqli_stmt_close($query);

        move_uploaded_file($_FILES["blogImg"]["tmp_name"], "blog_images/" . $_FILES["blogImg"]["name"]);

        // Use prepared statement to insert data
        $sql = mysqli_prepare(
            $con,
            "INSERT INTO `blog` (id, blogName, blogImg, description, date) VALUES (?, ?, ?, ?, ?)"
        );

        if ($sql) { // Check if query preparation successful
            mysqli_stmt_bind_param($sql, "issss", $maxId, $blogName, $blogImg, $description, $date);

            if (mysqli_stmt_execute($sql)) {
                $_SESSION['msg'] = "Blog Inserted Successfully !!";
            } else {
                $_SESSION['msg'] = "Error: " . mysqli_error($con);
            }

            mysqli_stmt_close($sql);
        } else {
            $_SESSION['msg'] = "Error: " . mysqli_error($con);
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nap Paints | Admin Panel | Add Blogs</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/NAP.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!--  Body Wrapper -->
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
                                <?php if (isset($_POST['submit'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                        <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>

                                <br />
                                <form name="brand_form" method="post" enctype="multipart/form-data">
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
                                          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                          <label for="date" class="form-label">Date</label>
                                          <input type="date" class="form-control" id="date" name="date" required>
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
