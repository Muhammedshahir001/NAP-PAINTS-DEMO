<?php
session_start();
include('../include/connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update category set categoryName='$category',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="Category Updated !!";

}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tento | Admin Panel | Home</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
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
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Category</h5>
              <div class="card">
                <div class="card-body">
                <?php if(isset($_POST['submit']))
                {?>
                <div class="alert alert-success" role="alert">
                <strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <br />
                  <form method="post">
                  <?php
                  $id=intval($_GET['id']);
                  $query=mysqli_query($con,"select * from category where id='$id'");
                  while($row=mysqli_fetch_array($query))
                  {
                  ?>
                    <div class="mb-3">
                      <label for="category" class="form-label">Edit Category</label>
                      <input type="text" name="category" value="<?php echo htmlentities($row['categoryName']);?>" class="form-control" id="category" aria-describedby="category">
                      <div id="category" class="form-text">Edit the current category required for the products</div>
                    </div>	
                    <?php } ?>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp; <button type="reset" name="submit" class="btn btn-danger">Reset</button> &nbsp; <a class="btn btn-success" href="../category/categorys.php" role="button">Go Back</a>
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