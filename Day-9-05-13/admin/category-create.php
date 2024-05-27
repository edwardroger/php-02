<?php
    include '../controllers/CategoryController.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_category'])) {
        $categoryController = new CategoryController();
        $result = $categoryController->create($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once './inc/head_meta.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php include_once './inc/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include_once './inc/navigation.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <label for="exampleInputEmail1" class="form-label">
                Create category
            </label>
            <form class="form-control" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category name</label>
                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Status</label>
                </div>
                <button type="submit" name="create_category" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
    <?php include_once './inc/fixed_plugin.php'; ?>
    <!--   Core JS Files   -->
    <?php include_once './inc/core_js.php'; ?>
</body>

</html>