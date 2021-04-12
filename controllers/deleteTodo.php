<?php
require "./app.php";
if (isset($_GET["id"])) :
    $status = $todoModel->deleteTodoById($_GET["id"]);
    echo $status;
endif;
