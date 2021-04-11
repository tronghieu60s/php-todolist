<?php require_once "./app.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "./views/head.php" ?>

<body>
    <div class="pt-5">
        <div class="container">
            <h1 class="text-center">Quản Lý Công Việc</h1>
            <div class="row mt-5">
                <div class="col-md-4">
                    <?php include_once "./views/form.php" ?>
                </div>
                <div class="col-md-8">
                    <?php include_once "./views/filter.php" ?>
                    <?php include_once "./views/table.php" ?>
                </div>
            </div>
        </div>
    </div>

    <script src="public/js/app.js"></script>
</body>

</html>