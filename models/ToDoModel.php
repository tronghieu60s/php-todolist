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
}
