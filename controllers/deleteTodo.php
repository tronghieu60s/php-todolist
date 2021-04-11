<?php
require "./app.php";
if (isset($_GET["id"])) :
    $status = $todoModel->deleteUserWithId($_GET["id"]);
    echo $status;
endif;
