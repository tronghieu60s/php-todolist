<?php
$todoList = $todoModel->getTodoList()
?>

<div class="mt-3">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
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
                        <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                    </td>
                </tr>
            <?php $index += 1;
            endforeach ?>
        </tbody>
    </table>
</div>