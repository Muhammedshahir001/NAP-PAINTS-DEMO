<?php
session_start();
include('include/connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['oldPassword'])."' && username='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $connect=mysqli_query($con,"update admin set password='".md5($_POST['newPassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tento | Admin Panel | Category</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.oldPassword.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.oldPassword.focus();
return false;
}
else if(document.chngpwd.newPassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newPassword.focus();
return false;
}
else if(document.chngpwd.confirmPassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmPassword.focus();
return false;
}
else if(document.chngpwd.newPassword.value!= document.chngpwd.confirmPassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmPassword.focus();
return false;
}
return true;
}
</script>
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

            <?php if(isset($_POST['submit']))
                {?>
                <div class="alert alert-success" role="alert">
                <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
           
            <form method="post" name="chngpwd" onSubmit="return valid();">
                  <div class="mb-4">
                    <label for="oldPassword" class="form-label">Old Password</label>
                    <input class="form-control" id="oldPassword" type="password" name="oldPassword">
                  </div>
                  <div class="mb-4">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input class="form-control" id="newPassword" type="password" name="newPassword">
                  </div>
                  <div class="mb-4">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input class="form-control" id="confirmPassword" type="password" name="confirmPassword">
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
          </div>
        </div>
        <?php include('footer.php') ?>
      </div>
      
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>

<?php } ?>