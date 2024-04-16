<?php
session_start();
include('../include/connect.php');

if (strlen($_SESSION['alogin']) == 0) {    
    header('location:../index.php');
} else {
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date('d-m-Y h:i:s A', time());

    $id = intval($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NAP Paints | Admin Panel | View Blogs</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/NAP.png">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('header.php') ?>
        <div class="body-wrapper">
            <?php include('menu-bar.php') ?>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">View Blog</h5>
                        <div class="card">
                            <div class="card-body">
                                <form name="brand_view_form" method="post" enctype="multipart/form-data">
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM blog WHERE id='$id'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <div class="mb-3">
                                            <label for="blogName" class="form-label">Blog Name</label>
                                            <input type="text" name="blogName" class="form-control" id="blogName" aria-describedby="blogName" value="<?php echo htmlentities($row['blogName']); ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="blogImage" class="form-label">Blog Image</label>
                                            <br>
                                            <img src="../blogs/blog_images/<?php echo htmlentities($row['blogImg']); ?>" width="300" height="300">
                                        </div>
                                        <div class="mb-3">
                                            <label for="blogDescription" class="form-label">Description</label>
                                            <input type="text" name="description" class="form-control" id="blogDescription" aria-describedby="blogDescription" value="<?php echo htmlentities($row['blogDescription']); ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                           <label for="date" class="form-label">Date</label>
                                          <input type="date" class="form-control" id="creationDate" name="creationDate" value="<?php echo date('Y-m-d'); ?>" disabled>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <a class="btn btn-success" href="../blogs/manage-blogs.php" role="button">Go Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
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

<?php
}
?>
