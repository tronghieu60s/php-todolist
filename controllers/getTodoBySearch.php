<?php
require "./app.php";
$todoList = Array();
if (isset($_GET["search"])) :
    $todoList = $todoModel->getTodoListBySearchName($_GET["search"]);
endif;
?>

<?php $index = 1;
foreach ($todoList as $todo) : ?>
    <tr id="list-<?= $todo["id"] ?>">
        <td scope="row"><?= $index ?></td>
        <td style="width: 45%;"><?= $todo["name"] ?></td>
        <td style="width: 25%;">
            <?php if ($todo["status"] == 0) : ?>
                <span id-todo="<?= $todo["id"] ?>" status="<?= $todo["status"] ?>" class="badge badge-primary badge-switch">Kích Hoạt</span>
            <?php else : ?>
                <span id-todo="<?= $todo["id"] ?>" status="<?= $todo["status"] ?>" class="badge badge-success badge-switch">Hoàn Tất</span>
            <?php endif ?>
        </td>
        <td style="width: 20%;">
            <button id-todo="<?= $todo["id"] ?>" type="button" class="btn btn-danger btn-sm btn-delete-todo">Xóa</button>
        </td>
    </tr>
<?php $index += 1;
endforeach ?>