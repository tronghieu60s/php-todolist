<?php
require "./app.php";
if (isset($_GET["name"]) && isset($_GET["status"])):
    $status = $todoModel->createTodo($_GET["name"], $_GET["status"]);
    echo $status;
endif;
