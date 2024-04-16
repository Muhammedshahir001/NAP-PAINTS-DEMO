<?php
session_start();
include('../include/connect.php');

if(strlen($_SESSION['alogin']) == 0) {	
    header('location:../index.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    if(isset($_GET['del'])) {
        $productId = intval($_GET['id']);
        $query = mysqli_query($con, "SELECT * FROM automotive_Products WHERE id='$productId'");
        $row = mysqli_fetch_assoc($query);
        $productImage = $row['ProductImage'];

        // Delete record from the database
        $deleteQuery = mysqli_query($con, "DELETE FROM automotive_Products WHERE id='$productId'");

        if($deleteQuery) {
                // Delete product image file
                $imagePath = "../products/automotiveproduct_images/" . $productImage; // Corrected path
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                } else {
                    $_SESSION['delmsg'] = "Error: Image file not found!";
                }
    
                $_SESSION['delmsg'] = "Product deleted successfully!";
            } else {
                $_SESSION['delmsg'] = "Error: " . mysqli_error($con);
            }
        }
    ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Manage Automotive  Products</title>
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
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include('menu-bar.php') ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Manage Automotive  Products</h5>
                            <div class="card mb-0">
                                <div class="card-body table-responsive">
                                    <?php if(isset($_GET['del'])) {?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                            <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php } ?>
                                    <br />
                                    <table class="table table-dark table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ProductName</th>
                                                <th scope="col">ProductImage</th>
                                                <th scope="col">Product Price</th>
                                                <th scope="col">View Product</th>
                                                <th scope="col">Edit Product</th>
                                                <th scope="col">Delete Product</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query = mysqli_query($con, "SELECT * from automotive_Products;");
                                                $cnt = 1;
                                                while($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                <td><?php echo htmlentities($row['ProductName']);?></td>
                                                <td><?php echo htmlentities($row['ProductImage']);?></td>
                                                <td><?php echo htmlentities($row['productPrice']);?></td>
                                                <td>
                                                    <a href="../products/view-automotive_Products.php?id=<?php echo $row['id']?>" >
                                                        <button class="btn btn-info btn-sm">View Product</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="../products/edit-automotive_Products.php?id=<?php echo $row['id']?>" >
                                                        <button class="btn btn-info btn-sm">Edit Product</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="manage-automotive_Products.php?id=<?php echo $row['id']?>&del=delete" 
                                                        onClick="return confirm('Are you sure you want to delete?')">
                                                        <button class="btn btn-danger btn-sm">Delete Product</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                                $cnt=$cnt+1;
                                                } 
                                            ?>
                                        </tbody>
                                    </table>
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
