<?php
require "./app.php";
if (isset($_GET["id"]) && isset($_GET["status"])) :
    $status = $todoModel->editStatusTodoById($_GET["id"], $_GET["status"]);
    echo $status;
endif;
