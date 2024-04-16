<?php
session_start();
include('../include/connect.php');

// Check if user is logged in
if (empty($_SESSION['alogin'])) {
    header('location:../index.php');
    exit();
}

// Set timezone
date_default_timezone_set('Asia/Kolkata');

// Function to handle file upload
function handleFileUpload($file, $destination) {
    if ($file['error'] === UPLOAD_ERR_OK) {
        $filename = $file['name'];
        $tmp_name = $file['tmp_name'];
        move_uploaded_file($tmp_name, $destination . $filename);
        return $filename;
    } else {
        return null;
    }
}

if (isset($_POST['update'])) {
    // Get form data
    $productId = isset($_POST['productId']) ? intval($_POST['productId']) : 0;
    $productName = isset($_POST['productName']) ? $_POST['productName'] : '';
    $productPrice = isset($_POST['productPrice']) ? $_POST['productPrice'] : '';

    // Check if new image is uploaded
    if (!empty($_FILES['productImg']['name'])) {
        $productImage = handleFileUpload($_FILES['productImg'], "buildingproduct_images/");
        // Prepare and execute update query with product image
        $sql = mysqli_prepare($con, "UPDATE building_Products SET productName = ?, productImage = ?, productPrice = ? WHERE id = ?");
        mysqli_stmt_bind_param($sql, "ssii", $productName, $productImage, $productPrice, $productId);
    } else {
        // Prepare and execute update query without product image
        $sql = mysqli_prepare($con, "UPDATE building_Products SET productName = ?, productPrice = ? WHERE id = ?");
        mysqli_stmt_bind_param($sql, "sii", $productName, $productPrice, $productId);
    }

    if (mysqli_stmt_execute($sql)) {
        $_SESSION['msg'] = "Product Updated Successfully!";
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($con);
    }
    mysqli_stmt_close($sql);
}

// Fetch product details for display
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = mysqli_query($con, "SELECT productName, productImage, productPrice FROM building_Products WHERE id = '$productId'");

if ($query) {
    $product = mysqli_fetch_assoc($query);
} else {
    $_SESSION['msg'] = "Error: Database query failed.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nap Paints | Admin Panel | Update Building Products</title>
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
            <?php include('menu-bar.php') ?>
            <!-- Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4"> Building Products</h5>
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_POST['update'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> <?php echo htmlentities($_SESSION['msg']); ?>
                                            <?php $_SESSION['msg'] = ""; ?>
                                            <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <!-- Add the form for updating products -->
                                    <form name="product_update_form" method="post" enctype="multipart/form-data">
                                        <!-- Add a hidden input field for the product ID -->
                                        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Product Name:</label>
                                            <input type="text" name="productName" class="form-control" id="productName" value="<?php echo htmlentities($product['productName']); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productPrice" class="form-label">Product Price:</label>
                                            <input type="text" name="productPrice" class="form-control" id="productPrice" value="<?php echo htmlentities($product['productPrice']); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productImg" class="form-label">Product Image</label>
                                            <br>
                                            <?php if (!empty($product['productImage'])) { ?>
                                                <img src="../products/buildingproduct_images/<?php echo htmlentities($product['productImage']); ?>" width="500" height="500">
                                            <?php } else { ?>
                                                <p style="color: red;">No Image Available</p>
                                            <?php } ?>
                                            <input type="file" class="form-control" id="productImg" name="productImg">
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                                        <a class="btn btn-success" href="../products/manage-building_Products.php" role="button">Go Back</a>
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

