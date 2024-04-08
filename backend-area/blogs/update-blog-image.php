<?php
session_start();
include('../include/connect.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:../index.php');
} else {
    $brandId = intval($_GET['id']); // brand id

    if (isset($_POST['submit'])) {
        $brandImage = $_FILES["brandImage"]["name"];
        $date = $_POST["date"]; // Capture the date value

        // Move uploaded file to the brand_images folder
        move_uploaded_file($_FILES["brandImage"]["tmp_name"], "../brands/brands_images/" . $_FILES["brandImage"]["name"]);

        // Update brand image and date in the database
        $sql = mysqli_prepare($con, "UPDATE Brands SET BrandImage = ?, Date = ? WHERE id = ?");
        mysqli_stmt_bind_param($sql, "ssi", $brandImage, $date, $brandId);

        if (mysqli_stmt_execute($sql)) {
            $_SESSION['msg'] = "Brand Image and Date Updated Successfully!";
        } else {
            $_SESSION['msg'] = "Error: " . mysqli_error($con);
        }

        mysqli_stmt_close($sql);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KELLCOMAN | Admin Panel | Update Brand Image</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include('header.php') ?>
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->

            <!-- Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Update Brand Image</h5>
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <br />

                                    <form name="brand_update_form" method="post" enctype="multipart/form-data">
                                        <?php
                                        $query = mysqli_query($con, "SELECT BrandName, BrandImage FROM Brands WHERE id='$brandId'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <div class="mb-3">
                                                <label for="brandName" class="form-label">Brand Name</label>
                                                <input type="text" name="brandName" class="form-control" id="brandName" aria-describedby="brandName" value="<?php echo htmlentities($row['BrandName']); ?>" disabled="disabled">
                                            </div>
                                            <div class="mb-3">
                                                <label for="brandImage" class="form-label">Brand Image</label>
                                                <br>
                                                <img src="../brands/brands_images/<?php echo htmlentities($row['BrandImage']); ?>" width="300" height="300">
                                            </div>
                                            <div class="mb-3">
                                                <label for="brandImage" class="form-label">New Brand Image</label>
                                                <input type="file" class="form-control-file" id="brandImage" name="brandImage" aria-describedby="brandImage" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp; <a class="btn btn-success" href="../brands/manage-brands.php" role="button">Go Back</a>
                                        <?php } ?>
                                    </form>
                                </div>
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
