<?php
session_start();
include('../include/connect.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.php');
}
else
{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    $productId = intval($_GET['id']); // product id
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nap Paints | Admin Panel | View  Automotive Products</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/grand-shamali-logo.png">
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
                            <h5 class="card-title fw-semibold mb-4">View Automotive  Products</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form name="product_view_form" method="post" enctype="multipart/form-data">
                                        <?php
                                            $query = mysqli_query($con, "SELECT * FROM automotive_Products WHERE id='$productId'");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($query))
                                            {
                                        ?>
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" name="productName" class="form-control" id="productName" aria-describedby="productName" value="<?php echo htmlentities($row['ProductName']);?>" disabled="disabled">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productPrice" class="form-label">Product Price</label>
                                            <input type="text" name="productPrice" class="form-control" id="productPrice" aria-describedby="productPrice" value="<?php echo htmlentities($row['productPrice']);?>" disabled="disabled">
                                        </div>
                                        <div class="mb-3">
                                            <label for="ProductImage" class="form-label">Product Image</label>
                                            <br>
                                            <img src="../products/product_images/<?php echo htmlentities($row['ProductImage']);?>" width="300" height="300">
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <a class="btn btn-success" href="../products/manage-automotive_Products.php" role="button">Go Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('footer.php');?>
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
