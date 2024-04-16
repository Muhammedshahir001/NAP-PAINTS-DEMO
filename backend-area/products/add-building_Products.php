<?php
session_start();
include('../include/connect.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:../index.php');
} else {
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productImage = $_FILES['productImg']['name'];

        // Get the maximum ID from the 'building_Products' table
        $query = mysqli_prepare($con, 'SELECT MAX(id) AS pid FROM building_Products');
        if (!mysqli_stmt_execute($query)) {
            die('Error executing query: ' . mysqli_error($con));
        }
        $result = mysqli_stmt_get_result($query);
        $row = mysqli_fetch_assoc($result);
        $maxId = $row['pid'] + 1;
        mysqli_stmt_close($query);

        move_uploaded_file($_FILES['productImg']['tmp_name'], 'buildingproduct_images/' . $_FILES['productImg']['name']);

        // Use prepared statement to insert data
        $sql = mysqli_prepare($con, 'INSERT INTO building_Products (id, productName, productPrice, productImage) VALUES (?, ?, ?, ?)');
        if (!$sql) {
            die('Error preparing statement: ' . mysqli_error($con));
        }
        mysqli_stmt_bind_param($sql, 'isss', $maxId, $productName, $productPrice, $productImage);

        if (mysqli_stmt_execute($sql)) {
            $_SESSION['msg'] = 'Product Inserted Successfully !!';
        } else {
            $_SESSION['msg'] = 'Error: ' . mysqli_error($con);
        }

        mysqli_stmt_close($sql);
    }
}
?>

<!doctype html>
<html lang = 'en'>

<head>
<meta charset = 'utf-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1'>
<title>Nap Paints | Admin Panel | Add Building Product</title>
<link rel = 'shortcut icon' type = 'image/png' href = '../assets/images/logos/favicon.png' />
<link rel = 'stylesheet' href = '../assets/css/styles.min.css' />
<link rel = 'stylesheet' href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>
</head>

<body>
<!--  Body Wrapper -->
<div class = 'page-wrapper' id = 'main-wrapper' data-layout = 'vertical' data-navbarbg = 'skin6' data-sidebartype = 'full'
data-sidebar-position = 'fixed' data-header-position = 'fixed'>
<!-- Sidebar Start -->
<?php include( 'header.php' ) ?>
<!--  Sidebar End -->
<!--  Main wrapper -->
<div class = 'body-wrapper'>
<!--  Header Start -->
<?php include( 'menu-bar.php' ) ?>
<!--  Header End -->
<div class = 'container-fluid'>
<div class = 'container-fluid'>
<div class = 'card'>
<div class = 'card-body'>
<h5 class = 'card-title fw-semibold mb-4'>Add Building Products</h5>
<div class = 'card'>
<div class = 'card-body'>
<?php if ( isset( $_POST[ 'submit' ] ) ) {
    ?>
    <div class = 'alert alert-success' role = 'alert'>
    <strong>Well done!</strong> <?php echo htmlentities( $_SESSION[ 'msg' ] );
    ?><?php echo htmlentities( $_SESSION[ 'msg' ] = '' );
    ?>
    <button type = 'button' style = 'float: right;' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
    </div>
    <?php }
    ?>

    <?php if ( isset( $_GET[ 'del' ] ) ) {
        ?>
        <div class = 'alert alert-danger' role = 'alert'>
        <strong>Oh snap!</strong> <?php echo htmlentities( $_SESSION[ 'delmsg' ] );
        ?><?php echo htmlentities( $_SESSION[ 'delmsg' ] = '' );
        ?>
        <button type = 'button' style = 'float: right;' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
        </div>
        <?php }
        ?>
        <br />
        <form name = 'rice_product' method = 'post' enctype = 'multipart/form-data'>
            <div class = 'mb-3'>
            <label for = 'productName' class = 'form-label'>Product Name</label>
            <input type = 'text' name = 'productName' class = 'form-control' id = 'productName' aria-describedby = 'productName' required>
            <div id = 'productName' class = 'form-text'>Insert the product name</div>
            </div>

            <div class = 'mb-3'>
            <label for = 'productPrice' class = 'form-label'>Product Price</label>
            <input type = 'text' name = 'productPrice' class = 'form-control' id = 'productPrice' aria-describedby = 'productPrice' required>
            <div id = 'productPrice' class = 'form-text'>Insert the product price</div>
            </div>

            <div class = 'mb-3'>
            <label for = 'productImg' class = 'form-label'>Product Image</label>
            <input type = 'file' class = 'form-control-file' id = 'productImg' name = 'productImg' aria-describedby = 'productImg' required>
            <div id = 'productImg' class = 'form-text'>Insert the product image</div>
            </div>
            <button type = 'submit' name = 'submit' class = 'btn btn-primary'>Submit</button> &nbsp;
            <button type = 'reset' name = 'submit' class = 'btn btn-danger'>Reset</button> &nbsp;
            <a class = 'btn btn-success' href = '../products/add-building_Products.php' role = 'button'>Go Back</a>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
            <?php include( 'footer.php' );
            ?>
            </div>
            </div>
            </div>
            <script src = '../assets/libs/jquery/dist/jquery.min.js'></script>
            <script src = '../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'></script>
            <script src = '../assets/js/sidebarmenu.js'></script>
            <script src = '../assets/js/app.min.js'></script>
            <script src = '../assets/libs/apexcharts/dist/apexcharts.min.js'></script>
            <script src = '../assets/libs/simplebar/dist/simplebar.js'></script>
            <script src = '../assets/js/dashboard.js'></script>
            </body>

            </html>