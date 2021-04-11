<?php
require "./app.php";
$todoList = $todoModel->getTodoList()
?>

<?php $index = 1;
foreach ($todoList as $todo) : ?>
    <tr id="list-<?= $todo["id"] ?>">
        <td scope="row"><?= $index ?></td>
        <td><?= $todo["name"] ?></td>
        <td>
            <?php if ($todo["status"] == 0) : ?>
                <span class="badge badge-primary">Kích Hoạt</span>
            <?php else : ?>
                <span class="badge badge-success">Hoàn Tất</span>
            <?php endif ?>
        </td>
        <td>
            <button type="button" class="btn btn-warning btn-sm">Sửa</button>
            <button id-todo="<?= $todo["id"] ?>" type="button" class="btn btn-danger btn-sm btn-delete-todo">Xóa</button>
        </td>
    </tr>
<?php $index += 1;
endforeach ?>