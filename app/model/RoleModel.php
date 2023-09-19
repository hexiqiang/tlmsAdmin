<?php
declare (strict_types = 1);

namespace app\model;

use think\facade\Db;
use think\Model;

/**
 * @mixin \think\Model
 */
class RoleModel extends Model
{
    //
    protected $table = "tlms_role";

    public function getField($where, $field = null)
    {

        if (!is_null($field)){
            $result = Db::table($this -> table) -> where($where) -> value($field);
        }else{
            $result = Db::table($this -> table) -> where($where) -> find();
        }
        return $result;
    }
}
