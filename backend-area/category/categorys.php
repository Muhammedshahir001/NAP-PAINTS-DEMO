<?php
session_start();
include('../include/connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
$sql=mysqli_query($con,"insert into category(categoryName) values('$category')");
$_SESSION['msg']="Category Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from category where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Category deleted !!";
		  }

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nap Paints | Admin Panel | Category Add & Manage</title>
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
                
                <?php if(isset($_GET['del']))
                {?>
                <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                    <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                  <form method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Add Product Category</label>
                      <input type="text" name="category" class="form-control" id="exampleInputEmail1" aria-describedby="category">
                      <div id="category" class="form-text">Submit the correct  category required for the products</div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp; <button type="reset" name="submit" class="btn btn-danger">Reset</button>
                  </form>
                </div>
              </div>
              <h5 class="card-title fw-semibold mb-4">Manage  Product Categories</h5>
              <div class="card mb-0">
                <div class="card-body table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php $query=mysqli_query($con,"select * from category");
                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    { ?>
                    <tr>
                        <th scope="row"><?php echo htmlentities($cnt);?></th>
                        <td><?php echo htmlentities($row['categoryName']);?></td>
                        <td>
                        <a href="../category/edit-categorys.php?id=<?php echo $row['id']?>" ><button class="btn btn-info btn-sm">View/Edit</button></a>
                        <a href="categorys.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                        <button class="btn btn-danger btn-sm">Delete</button></a>
                        </td>
                    </tr>
                    <?php $cnt=$cnt+1; } ?>
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