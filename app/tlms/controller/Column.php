<?php


namespace app\tlms\controller;


use app\model\ColumnModel;

class Column extends Common
{
    public function getColumn()
    {
        $model= new ColumnModel();
        $result = $model -> getColumn(["name", "action", "url", "background", "icon"]);
        echo returnJson(0, "success", $result, 200);
    }
}
