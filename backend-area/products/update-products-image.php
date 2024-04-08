<?php
session_start();
include('../include/connect.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:../index.php');
} else {
    $productId = intval($_GET['id']); // product id

    if (isset($_POST['submit'])) {
        $productimage1 = $_FILES["productImg"]["name"];

        // Move uploaded file to the product_images folder
        move_uploaded_file($_FILES["productImg"]["tmp_name"], "automotiveproduct_images/" . $_FILES["productImg"]["name"]);

        // Update product image in the database
        $sql = mysqli_prepare($con, "UPDATE automotive_Products SET ProductImage = ? WHERE id = ?");
        mysqli_stmt_bind_param($sql, "si", $productimage1, $productId);

        if (mysqli_stmt_execute($sql)) {
            $_SESSION['msg'] = "Product Image Updated Successfully !!";
        } else {
            $_SESSION['msg'] = "Error: " . mysqli_error($con);
        }

        mysqli_stmt_close($sql);
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KELLCOMAN | Admin Panel | Update Automotive Product Image</title>
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
                            <h5 class="card-title fw-semibold mb-4">Update Automotive Product Image</h5>
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <br />

                                    <form name="product_update_form" method="post" enctype="multipart/form-data">
                                        <?php
                                        $query = mysqli_query($con, "SELECT ProductName, ProductImage FROM automotive_Products WHERE id='$productId'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <div class="mb-3">
                                                <label for="productName" class="form-label">Product Name</label>
                                                <input type="text" name="productName" class="form-control" id="productName" aria-describedby="productName" value="<?php echo htmlentities($row['ProductName']); ?>" disabled="disabled">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImg" class="form-label">Product Image</label>
                                                <br>
                                                <img src="../products/automotiveproduct_images/<?php echo htmlentities($row['ProductImage']); ?>" width="300" height="300">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImg" class="form-label">New Product Image</label>
                                                <input type="file" class="form-control-file" id="productImg" name="productImg" aria-describedby="productImg" required>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp; <a class="btn btn-success" href="../products/manage-automotive_products.php" role="button">Go Back</a>
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

<?php } ?>
