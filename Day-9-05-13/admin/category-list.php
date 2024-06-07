<?php
    include '../controllers/CategoryController.php';

    $categoryController = new CategoryController();
    $result = $categoryController->list();

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $deleteResult = $categoryController->destroy($id);
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
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>List category</h6>
                        </div>
                        <span class="text-success">
                            <?=
                                isset($deleteResult['response']['success'])
                                ? $deleteResult['response']['success']
                                : ''
                            ?>
                        </span>
                        <span class="text-error">
                            <?=
                                isset($deleteResult['response']['error'])
                                ? $deleteResult['response']['error']
                                : ''
                            ?>
                        </span>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if ($result) {
                                                $i = 0;
                                                while ($category = $result->fetch_assoc()) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2">
                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-sm"><?= $category['name'] ?></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-xs font-weight-bold">
                                                                <?= $category['status'] ? 'On' : 'Off' ?>
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="./category-update.php?id=<?= $category['id'] ?>">Update</a>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="?delete=<?= $category['id'] ?>" class="btn btn-link text-secondary mb-0">
                                                                Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once './inc/fixed_plugin.php'; ?>
    <!--   Core JS Files   -->
    <?php include_once './inc/core_js.php'; ?>
</body>

</html>
<!-- 
Bài tập:
Thực hiện confirm delete.
Sau khi delete thành công thì sẽ load lại trang hoặc load lại data. -->