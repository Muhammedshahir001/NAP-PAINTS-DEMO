<?php
session_start();
include('../include/connect.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:../index.php');
    exit();
} else {
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['update'])) {
        $Id = $_POST['id'];
        $blogName = isset($_POST['blogName']) ? $_POST['blogName'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $blogImg = isset($_FILES['blogImg']['name']) ? $_FILES['blogImg']['name'] : '';
        $Date = isset($_POST['date']) ? $_POST['Date'] : '';

        // Upload new image if provided
        if (!empty($blogImg)) {
            $targetDir = '../blogs/blog_images/';
            $targetFilePath = $targetDir . basename($blogImg);
            move_uploaded_file($_FILES['blogImg']['tmp_name'], $targetFilePath);
        }

        // Update blog details including the date field if provided
        if (!empty($blogImg)) {
            $sql = mysqli_prepare($con, 'UPDATE `blog` SET blogName = ?, description = ?, blogImg = ?, Date = ? WHERE Id = ?');
            mysqli_stmt_bind_param($sql, 'ssssi', $blogName, $description, $blogImg, $Date, $Id);
        } else {
            $sql = mysqli_prepare($con, 'UPDATE `blog` SET blogName = ?, description = ?, Date = ? WHERE Id = ?');
            mysqli_stmt_bind_param($sql, 'sssi', $blogName, $description, $date, $Id);
        }

        if (mysqli_stmt_execute($sql)) {
            $_SESSION['msg'] = 'Blog Updated Successfully!';
        } else {
            $_SESSION['msg'] = 'Error: ' . mysqli_error($con);
        }

        mysqli_stmt_close($sql);

        header('location: update-blogs.php?id=' . $Id); // Redirect after form submission
        exit();
    }

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $query = mysqli_query($con, "SELECT blogName, blogImg, description, Date FROM blog WHERE Id = '$Id'");

    if ($query) {
        $blog = mysqli_fetch_assoc($query);
    } else {
        $_SESSION['msg'] = 'Error: Database query failed.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nap Paints | Admin Panel | Update Blogs</title>
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
                            <h5 class="card-title fw-semibold mb-4">Update Blogs</h5>
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_SESSION['msg'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Success:</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ''); ?>
                                        <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php } ?>
                                    <!-- Add the form for updating blogs -->
                                    <form name="blog_update_form" method="post" enctype="multipart/form-data">
                                        <!-- Add a hidden input field for the blog ID -->
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="mb-3">
                                            <label for="blogName" class="form-label">Blog Name:</label>
                                            <input type="text" name="blogName" class="form-control" id="blogName" value="<?php echo htmlentities($blog['blogName']); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description:</label>
                                            <textarea name="description" class="form-control" id="description"><?php echo htmlentities($blog['description']); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date:</label>
                                            <input type="date" name="date" class="form-control" id="date" value="<?php echo isset($blog['Date']) ? $blog['Date'] : ''; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="blogImg" class="form-label">Blog Image:</label>
                                            <br>
                                            <?php
                                            if (!empty($blog['blogImg'])) {
                                                $imagePath = '../blogs/blog_images' . htmlentities($blog['blogImg']);
                                                if (file_exists($imagePath)) {
                                                    echo '<img src="' . $imagePath . '" width="500" height="500">';
                                                } else {
                                                    echo '<p style="color: red;">Error: Blog Image not found.</p>';
                                                }
                                            } else {
                                                echo '<p style="color: red;">No Blog Image found.</p>';
                                            }
                                            ?>
                                            <input type="file" name="blogImg" class="form-control" id="blogImg">
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary">Update Blog</button>
                                        <a class="btn btn-success" href="../blogs/manage-blogs.php" role="button">Go Back</a>
                                    </form>
                                </div>
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
