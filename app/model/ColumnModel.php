<?php
declare (strict_types = 1);

namespace app\model;

use think\facade\Db;
use think\Model;

/**
 * @mixin \think\Model
 */
class ColumnModel extends Model
{
    //
    protected $table = "tlms_column";


    public function getColumn($field = [], $where = [])
    {
        $result = Db::table($this -> table) -> where($where) -> field($field)  -> select();
        return $result;
    }
}
