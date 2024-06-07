<?php
    include '../controllers/CategoryController.php';

    if (isset($_GET['id'])) {
        $categoryController = new CategoryController();
        $category = $categoryController->show($_GET['id']);
        if (!$category) {
            header("Location: ./category-list.php");
        }
    }

    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_category'])) {
    //     $categoryController = new CategoryController();
    //     $result = $categoryController->create($_POST, $$_GET['id']);
    // }
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
            <span class="text-success">
                <?=
                    isset($result['response']['success'])
                    ? $result['response']['success']
                    : ''
                ?>
            </span>
            <span class="text-error">
                <?=
                    isset($result['response']['error'])
                    ? $result['response']['error']
                    : ''
                ?>
            </span>
            <form class="form-control" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category name</label>
                    <span class="text-error">
                        <?=
                            isset($result['error']['category_name'])
                            ? $result['error']['category_name']
                            : ''
                        ?>
                    </span>
                    <input type="text" value="<?= $category['name'] ?>" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Status</label>
                </div>
                <button type="submit" name="create_category" class="btn btn-primary">Update</button>
            </form>
        </div>
    </main>
    <?php include_once './inc/fixed_plugin.php'; ?>
    <!--   Core JS Files   -->
    <?php include_once './inc/core_js.php'; ?>
</body>

</html>
<!-- Kiểm tra:
- Thực hiện confirm delete
- Thực hiện update category -->