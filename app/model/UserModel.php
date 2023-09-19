<?php
declare (strict_types = 1);

namespace app\model;

use think\facade\Db;
use think\Model;

/**
 * @mixin \think\Model
 */
class UserModel extends Model
{
    //
    protected $table = "tlms_user";


    public function getUser($user, $passwd)
    {
        $result = Db::table($this ->table) -> where('username',$user) ->find();
        if ($result){
            if ($result["password"] == md5($passwd)){
                if ($result["status"] == 1){
                    return $result;
                }
                return "该用户已停用";
            }
            return "密码有误";
        }
        return "没有该用户";
    }

}
