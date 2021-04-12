<?php

class TodoModel extends Db
{

    public function getTodoList()
    {
        $sql = self::$connection->prepare("SELECT * FROM `todolist`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTodoListBySearchName($name)
    {
        $sql = self::$connection->prepare("SELECT * FROM `todolist` WHERE `todolist`.`name` like CONCAT('%',?,'%')");
        $sql->bind_param("s", $name);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function createTodo($name, $status)
    {
        $sql = self::$connection->prepare("INSERT INTO `todolist`(`name`, `status`) VALUES (?, ?)");
        $sql->bind_param("si", $name, $status);
        return $sql->execute();
    }

    public function deleteTodoById($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `todolist` WHERE `todolist`.`id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function editStatusTodoById($id, $status)
    {
        $sql = self::$connection->prepare("UPDATE `todolist` SET `todolist`.`status` = ? WHERE `todolist`.`id` = ?");
        $sql->bind_param("si", $status, $id);
        return $sql->execute();
    }
}
