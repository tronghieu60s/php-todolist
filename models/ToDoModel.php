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

    public function createTodo($name, $status)
    {
        $sql = self::$connection->prepare("INSERT INTO `todolist`(`name`, `status`) VALUES (?, ?)");
        $sql->bind_param("si", $name, $status);
        return $sql->execute();
    }
}
